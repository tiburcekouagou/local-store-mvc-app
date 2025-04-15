<?php

use App\Controllers\OrderController;
use App\Services\OrderService;
use App\Services\ProductService;
use Core\Container;

Container::$instance->bind(OrderController::class, fn($app) => new OrderController(
    $app->make(OrderService::class),
    $app->make(ProductService::class)
));

Container::$instance->make(OrderController::class)->checkout();