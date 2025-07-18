<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Random\RandomException;

use function BrainGames\runGame;

/**
 * @throws RandomException
 */
function runGcdGame(): void
{
    $rule = 'Find the greatest common divisor of given numbers.';
    $roundsCount = 3;
    $questionsAndAnswers = [];

    for ($i = 0; $i < $roundsCount; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $question = "$num1 $num2";
        $answer = gcd($num1, $num2);
        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame($rule, $questionsAndAnswers);
}

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }

    return $a;
}
