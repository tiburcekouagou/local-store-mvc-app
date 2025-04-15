<?php

namespace Tests\Unit;

use App\Services\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase {
    public function testCanLogInfo() {
        $logger = new Logger();
        
        $this->expectOutputString("ℹ [Info]: Hello" . PHP_EOL);
        $logger->info("Hello");
    }
}