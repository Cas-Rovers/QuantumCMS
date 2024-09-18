<?php

    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\LanguageController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    |
    | This section is for registering the admin routes for your application.
    | These routes are automatically loaded via the bootstrap/app.php and are
    | commonly assigned to the "web" middleware group for web sessions. However,
    | it is highly recommended to also assign them to the "auth" middleware to
    | ensure proper authentication for authenticated access.
    |
    | Make something awesome happen!
    |
    */

    Route::middleware('auth')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/language/{locale}', [LanguageController::class, 'language'])->name('admin.language.switch');

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
