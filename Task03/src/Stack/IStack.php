<?php

namespace App\Stack;

interface IStack
{
    public function push(mixed ...$elements): void;

    public function pop(): mixed;

    public function top(): mixed;

    public function isEmpty(): bool;

    public function copy(): Stack;

    public function __toString(): string;
}
