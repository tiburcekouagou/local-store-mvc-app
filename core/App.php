<?php

namespace Core;

class App extends Container {
    public function boot() {
        require_once __DIR__ . "/../routes/web.php";
    }
}