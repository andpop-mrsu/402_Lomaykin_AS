<?php

use App\Stack\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPushAndEmpty()
    {
        $stack = new Stack();
        self:: assertTrue($stack->isEmpty());
        $stack->push("10000", 1212);
        self:: assertFalse($stack->isEmpty());
    }

    public function testTop(): void
    {
        $stack = new Stack(12, 3, "343", "3434", 45);
        self:: assertSame(45, $stack->top());
    }

    public function testPop(): void
    {
        $stack1 = new Stack(1, 5, 7, 3, "24453", 22);
        $stack2 = new Stack();
        self:: assertSame(22, $stack1->pop());
        self:: assertSame("24453", $stack1->top());
        self:: assertNull($stack2->pop());
    }

    public function testTextRepresentation(): void
    {
        $stack = new Stack(5, 4, 3, 2, 1, "faq", 111111);
        self:: assertSame("[111111->faq->1->2->3->4->5]", $stack->__toString());
    }

    public function testCopy()
    {
        $stack = new Stack(5, 1, 62, 46, "345xdxdxd", 43);
        $newStack = $stack->copy();
        self:: assertFalse($newStack->isEmpty());
        self:: assertSame(43, $newStack->top());
    }
}
