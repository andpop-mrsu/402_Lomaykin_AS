<?php

namespace App\Queue;


class Queue implements IQueue
{
    private array $queue = array();

    public function __construct(mixed ...$elements)
    {
        $this->enqueue(...$elements);
    }

    public function enqueue(mixed ...$elements): void
    {
        foreach ($elements as $elem) {
            $this->queue[] = $elem;
        }
    }

    public function dequeue(): mixed
    {
        if (!isset($this->queue[0])) {
            return null;
        }

        return array_shift($this->queue);
    }

    public function peek(): mixed
    {
        if (!isset($this->queue[0])) {
            return null;
        }

        return $this->queue[0];
    }

    public function isEmpty(): bool
    {
        return !isset($this->queue[0]);
    }

    public function copy(): Queue
    {
        return new Queue(...$this->queue);
    }

    public function __toString(): string
    {
        $textRepresentationQueue = "[";
        $arrow = "<-";
        foreach ($this->queue as $i => $iValue) {
            if ($i === count($this->queue) - 1) {
                $arrow = "";
            }
            $textRepresentationQueue .= $iValue . $arrow;
        }
        return $textRepresentationQueue . "]";
    }
}
