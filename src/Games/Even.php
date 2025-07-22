<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Random\RandomException;

use function BrainGames\runGame;

const EVEN_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

/**
 * @throws RandomException
 */
function runEvenGame(): void
{
    $roundsCount = 3;
    $questionsAndAnswers = [];

    for ($i = 0; $i < $roundsCount; ++$i) {
        $number = random_int(0, 100);
        $question = (string)$number;
        $answer = isEven($number) ? 'yes' : 'no';
        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame(EVEN_RULE, $questionsAndAnswers);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
