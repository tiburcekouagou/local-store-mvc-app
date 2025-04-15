<?php

use App\Controllers\OrderController;
use Core\App;
use Core\Container;
use Core\Facades\Route;



Route::get('/', function () {
    return "Bienvenue sur notre mini framework";
});

Route::get('/checkout', function () {
    $controller = Container::$instance->make(OrderController::class);
    $controller->checkout();
    return '';
});