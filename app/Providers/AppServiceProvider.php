<?php

    namespace App\Providers;

    use Illuminate\Pagination\Paginator;
    use Illuminate\Support\Facades\Blade;
    use Illuminate\Support\Facades\Gate;
    use Illuminate\Support\ServiceProvider;

    /**
     * App Service Provider
     *
     * This service provider is responsible for registering and bootstrapping
     * application services for the App namespace.
     */
    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * This method is called after all service providers have been registered,
         * and is used to register any application services with the IoC container.
         */
        public function register(): void {}

        /**
         * Bootstrap any application services.
         *
         * This method is called after all service providers have been registered
         * and all services have been resolved, and is used to bootstrap any
         * application services, such as setting up event listeners or middleware.
         */
        public function boot(): void
        {
            Gate::before(function ($user, $ability) {
                return $user->hasRole('Super Admin') ? true : null;
            });

            // component namespaces 'admin' and 'frontend',
            // example <x-admin::ComponentName/> or <x-frontend::ComponentName/>
            Blade::componentNamespace('App\\View\\Components\\Admin', 'admin');
            Blade::componentNamespace('App\\View\\Components\\Frontend', 'frontend');

            view()->composer('components.admin.language-switcher', function ($view) {
                $view->with('current_locale', app()->getLocale());
                $view->with('supported_locales', config('app.supported_locales'));
            });

            if (request()->is('admin/**')) {
                Paginator::useBootstrapFive();
            } else {
                Paginator::useTailwind();
            }
        }
    }
