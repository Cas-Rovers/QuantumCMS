<?php

    namespace App\Providers;

    use App\Actions\Fortify\CreateNewUser;
    use App\Actions\Fortify\ResetUserPassword;
    use App\Actions\Fortify\UpdateUserPassword;
    use App\Actions\Fortify\UpdateUserProfileInformation;
    use App\Models\User;
    use Hash;
    use Illuminate\Auth\Events\Lockout;
    use Illuminate\Cache\RateLimiting\Limit;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\RateLimiter;
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Str;
    use Laravel\Fortify\Fortify;

    /**
     * Service provider for configuring the Fortify package.
     *
     * This provider is responsible for bootstrapping the Fortify package and
     * configuring its behavior. It sets up custom classes for user creation,
     * profile updates, password updates, and password resets. Additionally,
     * it configures rate limiting for login attempts and two-factor authentication.
     */
    class FortifyServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * This method is called after all service providers have been registered.
         * It is used to register any additional services that are required by the
         * application.
         *
         * @return void
         */
        public function register(): void {}

        /**
         * Determine the rate limiting throttle key for the given request.
         *
         * @param  Request $request
         * @return string
         */
        protected function throttleKey(Request $request): string
        {
            $throttleKeyParts = [
                Str::lower(Fortify::username()),
                $request->ip(), // IP Address
                $request->path(), // Request Path
                $request->userAgent(), // User Agent
                $request->httpHost(), // HTTP Host
            ];
            $throttleKey = implode('|', array_filter($throttleKeyParts));

            return hash('sha256', $throttleKey);
        }

        /**
         * Bootstrap any application services.
         *
         * This method is called after all service providers have been registered.
         * It is used to bootstrap any services that are required by the application.
         *
         * @return void
         */
        public function boot(): void
        {
            Fortify::authenticateUsing(function (Request $request) {
                $user = User::whereEmail($request->email)->firstOrFail();
                $throttleKey = $this->throttleKey($request);

                if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
                    event(new Lockout($request));
                    $availableIn = RateLimiter::availableIn($throttleKey);

                    return response()->json([
                        'message' => 'Too many login attempts. Please try again in ' . $availableIn . ' seconds.',
                    ], 429);
                }

                if ($user && Hash::check($request->password, $user->password)) {
                    if ($user->is_active) {
                        RateLimiter::clear($throttleKey);

                        // (Optional) Check if 2FA is enabled for the user
                        //if ($user->two_factor_enabled) {
                        //// Perform two-factor authentication checks here,
                        //// for example, send OTP, verify code, and so on.
                        //}

                        return $user;
                    }

                    // Return an inactive user message
                    return response()->json([
                        'message' => 'Your account is inactive. Please contact support.',
                    ], 403);
                }
                RateLimiter::hit($throttleKey);

                return response()->json([
                    'message' => 'Invalid login credentials. Please check your email and password.',
                ], 401);
            });

            Fortify::createUsersUsing(CreateNewUser::class);
            Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
            Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
            Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

            Fortify::loginView(fn() => view('admin.auth.login'));

            RateLimiter::for('login', function (Request $request) {
                $throttleKey = $this->throttleKey($request);

                return Limit::perMinute(5)->by($throttleKey);
            });

            RateLimiter::for('two-factor', function (Request $request) {
                $throttleKey = $this->throttleKey($request);

                return Limit::perMinute(5)->by($throttleKey . '|' . $request->session()->get('login.id'));
            });
        }
    }
