<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Random\RandomException;

use function BrainGames\runGame;

use const BrainGames\ROUNDS_COUNT;

const GCD_RULE = 'Find the greatest common divisor of given numbers.';

/**
 * @throws RandomException
 */
function runGcdGame(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $question = "$num1 $num2";
        $answer = gcd($num1, $num2);
        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame(GCD_RULE, $questionsAndAnswers);
}

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }

    return $a;
}
