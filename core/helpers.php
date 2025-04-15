<?php

use Core\Config;
use Core\Container;
function config(string $key, $default = null) {
    /** @var Config $config */
    $config = Container::$instance->make(Config::class);
    return $config->get($key, $default);
}