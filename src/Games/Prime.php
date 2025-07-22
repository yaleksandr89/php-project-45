<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Random\RandomException;

use function BrainGames\runGame;

use const BrainGames\ROUNDS_COUNT;

const PRIME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

/**
 * @throws RandomException
 */
function runPrimeGame(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int(2, 100);
        $question = (string)$number;
        $answer = isPrime($number) ? 'yes' : 'no';
        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame(PRIME_RULE, $questionsAndAnswers);
}

function isPrime(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    for ($i = 2, $max = (int)sqrt($n); $i <= $max; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }

    return true;
}
