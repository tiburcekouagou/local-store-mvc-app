<?php

namespace Core;

class Config {
    protected array $items = [];

    public function __construct() {
        foreach(glob(__DIR__ . '/../config/*.php') as $file) {
            $key = basename($file, '.php');
            $this->items[$key] = require $file;
        }
    }

    public function get(string $key, $default = null) {
        $segments = explode('.', $key);
        $value = $this->items;

        foreach($segments as $segment) {
            if (! is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }

        return $value;
    }
}