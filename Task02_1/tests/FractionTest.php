<?php

use PHPUnit\Framework\TestCase;
use App\Fraction;

class FractionTest extends TestCase
{
    public function testRedaction()
    {
        $obj = new Fraction(168, 222);

        self::assertSame(28, $obj -> getNumer());
        self::assertSame(37, $obj -> getDenom());
    }

    public function testStringRepresentation()
    {
        $obj1 = new Fraction(15, 45);
        $obj2 = new Fraction(37, 13);

        self::assertSame("1/3", $obj1 -> __toString());
        self::assertSame("2'11/13", $obj2 -> __toString());
    }

    public function testAdding()
    {
        $obj1 = new Fraction(37, 13);
        $obj2 = new Fraction(22, 13);

        $obj3 = $obj1 -> add($obj2);
        self::assertEquals("4'7/13", $obj3);
    }

    public function testSubtraction()
    {
        $obj1 = new Fraction(37, 13);
        $obj2 = new Fraction(7, 13);

        $obj3 = $obj1 -> sub($obj2);
        self::assertEquals("2'4/13", $obj3);

        $obj4 = new Fraction(22, 13);
        $obj5 = $obj1 -> sub($obj4);
        self::assertEquals("1'2/13", $obj5);
    }
}
