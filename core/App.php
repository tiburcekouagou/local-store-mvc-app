<?php

namespace Core;

use App\Services\Logger;
use App\Services\Mailer;

class App extends Container {
    public Router $router;

    public function __construct() {
        parent::__construct();
        $this->router = new Router();
        self::$instance = $this;
        $this->bind(Config::class, fn () => new Config());
        $this->bind(Mailer::class, fn () => new Mailer());
        $this->bind(Logger::class, fn () => new Logger());
        $this->bind(Router::class, fn () => new Router());
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