<?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | This file is for registering the web routes for your application.
    | These routes are automatically loaded via the bootstrap/app.php
    | and are typically grouped under the "web" middleware,
    | which provides session state, CSRF protection, and more.
    | Customize these routes to deliver a smooth user experience and
    | ensure your application's functionality shines.
    |
    | Make something awesome happen!
    |
    */

    Route::get('/', function () {
        return view('frontend.index');
    })->name('frontend.index');

    // Admin routes.

    Route::prefix('admin')->group(function () {
        include __DIR__ . '/admin.php';
    });
