<?php

    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;

    /**
     * App Service Provider
     *
     * This service provider is responsible for registering and bootstrapping
     * application services for the App namespace.
     *
     * @package App\Providers
     */
    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * This method is called after all service providers have been registered,
         * and is used to register any application services with the IoC container.
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap any application services.
         *
         * This method is called after all service providers have been registered
         * and all services have been resolved, and is used to bootstrap any
         * application services, such as setting up event listeners or middleware.
         */
        public function boot(): void
        {
            //
        }
    }
