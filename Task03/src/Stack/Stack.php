<?php

namespace App\Stack;


class Stack implements IStack
{
    private $stack = array();

    public function __construct(mixed ...$elements)
    {
        $this->push(...$elements);
    }

    public function push(mixed ...$elements): void
    {
        foreach ($elements as $elem) {
            $this->stack[] = $elem;
        }
    }

    public function pop(): mixed
    {
        if (count($this->stack) === 0) {
            return null;
        }

        return array_pop($this->stack);
    }

    public function top(): mixed
    {
        if (count($this->stack) !== 0) {
            return $this->stack[count($this->stack) - 1];
        }

        return null;
    }

    public function isEmpty(): bool
    {
        return !isset($this->stack[0]);
    }

    public function copy(): Stack
    {
        return new Stack(...$this->stack);
    }

    public function __toString(): string
    {
        $textRepresentationStack = "[";
        $arrow = "->";
        for ($i = count($this->stack) - 1; $i >= 0; $i--) {
            if ($i === 0) {
                $arrow = "";
            }
            $textRepresentationStack .= $this->stack[$i] . $arrow;
        }
        return $textRepresentationStack . "]";
    }
}
