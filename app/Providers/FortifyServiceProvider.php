<?php

    namespace App\Providers;

    use App\Actions\Fortify\CreateNewUser;
    use App\Actions\Fortify\ResetUserPassword;
    use App\Actions\Fortify\UpdateUserPassword;
    use App\Actions\Fortify\UpdateUserProfileInformation;
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
     *
     * @package App\Providers
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
        public function register(): void
        {
            //
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
            Fortify::createUsersUsing(CreateNewUser::class);
            Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
            Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
            Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

            Fortify::loginView(fn () => view('admin.auth.login'));

            RateLimiter::for('login', function (Request $request) {
                $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

                return Limit::perMinute(5)->by($throttleKey);
            });

            RateLimiter::for('two-factor', function (Request $request) {
                return Limit::perMinute(5)->by($request->session()->get('login.id'));
            });
        }
    }
