<?php

namespace Core;

class App extends Container {
    public Router $router;

    public function __construct() {
        parent::__construct();
        $this->router = new Router();
        self::$instance = $this;
    }
    
    public function boot() {
        require_once __DIR__ . "/../routes/web.php";


        // Dispatch current request
        $this->router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    }

    public static function router(): Router {
        /**
         * @var \Core\App $app
         */
        $app = self::$instance;
        return $app->router;
    }
}