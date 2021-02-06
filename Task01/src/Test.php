<?php

namespace App\Test;

use App\Fraction;

function runTest()
{
    echo "Fractions tests \n\n";

    $fraction1 = new Fraction(5, 35);
    echo "Fraction: " . $fraction1 . "\n";
    echo "Correct result: 1/7 \n\n";

    echo "Get numerator: " . $fraction1->getNumer() . "\n";
    echo "Correct numerator: 1\n\n";

    echo "Get denominator: " . $fraction1->getDenom() . "\n";
    echo "Correct denominator: 7\n\n";

    echo "Fraction reduction: ". $fraction1 . "\n";
    echo "Correct result: 1/7 \n\n";

    $fraction2 = new Fraction(10, 7);
    echo "Selection of whole fraction: " . $fraction2 . "\n";
    echo "Correct result: 1 3/7 \n\n";

    $fraction3 = $fraction1->add($fraction2);
    echo "5/35 + 10/7 = " . $fraction3 . "\n";
    echo "Correct result: 1 4/7 \n\n";

    $fraction4 = $fraction2->sub($fraction1);
    echo "10/7 - 5/35 = " . $fraction4 . "\n";
    echo "Correct result: 1 2/7 \n\n";
}
