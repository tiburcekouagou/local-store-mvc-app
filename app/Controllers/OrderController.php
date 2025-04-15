<?php
namespace App\Controllers;

use App\Services\OrderService;
use App\Services\ProductService;

class OrderController {
    public function __construct(
        protected OrderService $orderService,
        protected ProductService $productService
    ) {}

    public function checkout() {
        $products = $this->productService->listProducts();
        echo "Produits en stock : " . implode(", ", $products) . PHP_EOL;

        $this->orderService->placeOrder("client@example.com");
    }
}