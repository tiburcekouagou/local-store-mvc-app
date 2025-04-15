<?php

namespace Core;

class Router {
    protected array $routes = [];

    public function get(string $uri, callable $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function dispatch(string $method, string $uri) {
        $action = $this->routes[$method][$uri] ?? null;

        if (! $action) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        echo call_user_func($action);
    }
}