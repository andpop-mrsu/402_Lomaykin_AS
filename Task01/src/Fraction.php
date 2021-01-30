<?php

namespace App;

class Fraction
{
    private $numer, $denom;

    public function __construct($numer, $denom)
    {
        $this->numer = $numer;
        $this->denom = $denom;
    }

    public function __toString(): string
    {
        return $this->numer . "/" . $this->denom;
    }

    public function getNumer()
    {
        return $this->numer;
    }

    public function getDenom()
    {
        return $this->denom;
    }

    public function add()
    {
    }

    public function sub()
    {
    }
}