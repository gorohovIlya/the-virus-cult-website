<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function test_password_length(): void
    {
        $this->assertTrue('12345678');
        $this->assertTrue('12345678_abc');
        $this->assertFalse('abc123');
    }
}
