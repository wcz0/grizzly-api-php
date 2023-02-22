<?php

use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group([
    'domain'     => config('admin.route.domain'),
    'prefix'     => config('admin.route.prefix'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->resource('dashboard', \App\Admin\Controllers\HomeController::class);

    $router->resource('system/settings', \App\Admin\Controllers\SettingController::class);

    $router->resource('user/users', UserController::class);
});
