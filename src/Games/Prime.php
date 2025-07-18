<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Random\RandomException;

use function BrainGames\runGame;

/**
 * @throws RandomException
 */
function runPrimeGame(): void
{
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $roundsCount = 3;
    $questionsAndAnswers = [];

    for ($i = 0; $i < $roundsCount; $i++) {
        $number = random_int(2, 100);
        $question = (string)$number;
        $answer = isPrime($number) ? 'yes' : 'no';
        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame($rule, $questionsAndAnswers);
}

function isPrime(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    for ($i = 2, $max = (int) sqrt($n); $i <= $max; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}
