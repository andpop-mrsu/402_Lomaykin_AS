<?php


use App\Queue\Queue;
use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase
{
    public function testEnqueueAndEmpty(): void
    {
        $queue = new Queue();
        self:: assertTrue($queue->isEmpty());
        $queue->enqueue("10000", 1212);
        self:: assertFalse($queue->isEmpty());
    }

    public function testPeek()
    {
        $queue = new Queue(12, 3, "343", "3434", 45);
        self:: assertSame(12, $queue->peek());
    }

    public function testDequeue(): void
    {
        $queue1 = new Queue(1, 5, 7, 3, "24453", 22);
        $queue2 = new Queue();
        self:: assertSame(1, $queue1->dequeue());
        self:: assertSame(5, $queue1->peek());
        self:: assertNull($queue2->dequeue());
    }

    public function testTextRepresentation(): void
    {
        $queue = new Queue(5, 4, 3, 2, 1, "faq", 111111);
        self:: assertSame("[5<-4<-3<-2<-1<-faq<-111111]", $queue->__toString());
    }

    public function testCopy(): void
    {
        $queue = new Queue(5, 1, 62, 46, "345xdxdxd", 43);
        $newQueue = $queue->copy();
        self:: assertFalse($newQueue->isEmpty());
        self:: assertSame(5, $newQueue->peek());
    }
}
