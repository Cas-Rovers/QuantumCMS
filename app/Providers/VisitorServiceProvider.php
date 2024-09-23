<?php

namespace App\Providers;

use App\Http\Middleware\TrackVisitors;
use App\Models\Admin\Visitor;
use Illuminate\Support\ServiceProvider;
use View;

class VisitorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app['router']->pushMiddlewareToGroup('web', TrackVisitors::class);

//        View::share('visitorCount', Visitor::count());
    }
}
