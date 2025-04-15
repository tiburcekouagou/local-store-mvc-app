<?php

namespace Core;

use ReflectionClass;

class Container {
    protected array $bindings = [];
    public static Container $instance;

    public function __construct() {
        self::$instance = $this;
    }

    public function bind(string $abstract, callable $concrete) {
        $this->bindings[$abstract] = $concrete;
        return $this->bindings;
    }

    public function make(string $abstract) {
        if (isset($this->bindings[$abstract])) {
            return $this->bindings[$abstract]($this);
        }

        return $this->resolve($abstract);
    }

    public function resolve(string $class) {
        $reflector = new ReflectionClass($class);

        if (! $reflector->isInstantiable()) {
            throw new \Exception("Class $class is not instantiable.");
        }

        $constructor = $reflector->getConstructor();

        if (! $constructor) {
            return new $class;
        }

        $dependencies = [];

        foreach ($constructor->getParameters() as $param) {
            $type = $param->getType();
            if (!$type) throw new \Exception("Can't resolve {$param->name}");
            $dependencies[] = $this->make($type->getName());
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}