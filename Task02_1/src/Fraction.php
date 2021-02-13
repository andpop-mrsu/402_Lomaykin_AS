<?php

namespace App;

class Fraction
{
    private $numer, $denom;

    public function __construct($numer, $denom)
    {
        if (!is_int($numer) || !is_int($denom)) {
            echo "Numerator and denominator must be integers!";
            exit;
        }

        $this->setFraction($numer, $denom);
    }

    public function __toString(): string
    {
        $numer = $this->numer;
        $denom = $this->denom;

        if (abs($numer) > $denom) {
            return $this->createFractionView();
        }

        return $numer . "/" . $denom;
    }

    public function setFraction($numer, $denom)
    {
        $gcd = $this->gcd($numer, $denom);

        $this->numer = $numer / $gcd;
        $this->denom = $denom / $gcd;
    }

    public function gcd(int $a, int $b): int
    {
        return ($a % $b) ? $this->gcd($b, $a % $b) : abs($b);
    }

    public function createFractionView(): string
    {
        $numer = $this->numer;
        $denom = $this->denom;
        $int = (int)($numer / $denom);
        $numerator = abs($numer % $denom);

        return $int . "'" . $numerator . "/" . $denom;
    }

    public function getNumer(): int
    {
        return $this->numer;
    }

    public function getDenom(): int
    {
        return $this->denom;
    }

    public function add(Fraction $frac): Fraction
    {
        $firstNumer = $this->numer;
        $firstDenom = $this->denom;
        $secondNumer = $frac->numer;
        $secondDenom = $frac->denom;

        $numer = $firstNumer * $secondDenom + $firstDenom * $secondNumer;
        $denom = $firstDenom * $secondDenom;

        return new Fraction($numer, $denom);
    }

    public function sub(Fraction $frac): Fraction
    {
        $firstNumer = $this->numer;
        $firstDenom = $this->denom;
        $secondNumer = $frac->numer;
        $secondDenom = $frac->denom;

        $numer = $firstNumer * $secondDenom - $firstDenom * $secondNumer;
        $denom = $firstDenom * $secondDenom;

        return new Fraction($numer, $denom);
    }
}
