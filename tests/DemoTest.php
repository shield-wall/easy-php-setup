<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    public function testFirstTest(): void
    {
        $this->assertSame('abc', 'abc');
    }
}
