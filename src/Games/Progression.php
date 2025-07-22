<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Random\RandomException;

use function BrainGames\runGame;

use const BrainGames\ROUNDS_COUNT;

const PROGRESSION_RULE = 'What number is missing in the progression?';

/**
 * @throws RandomException
 */
function runProgressionGame(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $progressionLength = random_int(5, 10);
        $start = random_int(1, 30);
        $step = random_int(1, 10);
        $missingIndex = random_int(0, $progressionLength - 1);
        $progression = buildProgression($start, $step, $progressionLength);

        $correctAnswer = $progression[$missingIndex];
        $progression[$missingIndex] = '..';

        $question = implode(' ', $progression);
        $questionsAndAnswers[] = [$question, $correctAnswer];
    }

    runGame(PROGRESSION_RULE, $questionsAndAnswers);
}

function buildProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    return $progression;
}
