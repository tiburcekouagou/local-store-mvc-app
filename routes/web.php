<?php

use App\Controllers\OrderController;
use Core\App;
use Core\Container;


$router = App::router();

$router->get('/', function () {
    return "Bienvenue sur notre mini framework";
});

$router->get('/checkout', function () {
    $controller = Container::$instance->make(OrderController::class);
    $controller->checkout();
    return '';
});