<?php

use PHPUnit\Framework\TestCase;

use function App\checkBalanced;

class CheckBalancedTest extends TestCase
{
    public function testCheckIfBalanced(): void
    {
        self::assertTrue(checkBalanced("(ab[cd{}])"));
        self::assertFalse(checkBalanced("(ab[cd{})"));
        self::assertFalse(checkBalanced("(ab[cd{]})"));
    }
}
