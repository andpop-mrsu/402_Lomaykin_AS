<?php

namespace App;

use App\Stack\Stack;

function checkBalanced(string $expression): bool
{
    $openingSymbols = array("<", "[", "{", "(");
    $closingSymbols = array(">", "]", "}", ")");
    $stack = new Stack();
    for ($i = 0, $iMax = strlen($expression); $i < $iMax; $i++) {
        if (in_array($expression[$i], $openingSymbols)) {
            $stack->push($expression[$i]);
        } elseif (in_array($expression[$i], $closingSymbols)) {
            if ($stack->isEmpty()) {
                return false;
            }

            if (preg_match("/\{\}|\[\]|\<\>|\(\)/", $stack->top() . $expression[$i])) {
                $stack->pop();
            } else {
                return false;
            }
        }
    }
    return $stack->isEmpty();
}
