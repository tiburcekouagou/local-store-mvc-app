<?php

namespace Tests\Unit;

use App\Services\Mailer;
use App\Services\ProductService;
use Core\Container;
use Exception;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase {
    public function testCanBindAndResolveManually() {
        $container = new Container();

        $container->bind(Mailer::class, fn () => new Mailer());

        $mailer = $container->make(Mailer::class);

        $this->assertInstanceOf(Mailer::class, $mailer);
        $this->assertEquals("📧 Email sent to tiburce@example.com: Hi" . PHP_EOL, $mailer->send("tiburce@example.com", "Hi"));
    }

    public function testCanAutoResolveDependencies() {
        $container = new Container();

        $productService = $container->make(ProductService::class);

        $this->assertInstanceOf(ProductService::class, $productService);
        $this->assertEquals(["Baguette", "Tomate", "Jus de mangue"], $productService->listProducts());
    }

    public function testThrowsExceptionForUninstantiableClass() {
        $this->expectException(Exception::class);

        $container = new Container();
        $container->make('NonExistentClass');
    }
}