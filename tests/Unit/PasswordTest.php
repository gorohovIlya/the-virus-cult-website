<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function test_password_length(): void
    {
        $this->assertTrue(strlen('12345678') >= 8);
        $this->assertTrue(strlen('12345678_abc') >= 8);
        $this->assertFalse(strlen('abc123') >= 8);
    }
}
