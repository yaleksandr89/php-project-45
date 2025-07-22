<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Exception;
use Random\RandomException;

use function BrainGames\runGame;

use const BrainGames\ROUNDS_COUNT;

const CALC_RULE = 'What is the result of the expression?';

/**
 * @throws RandomException
 * @throws Exception
 */
function runCalcGame(): void
{
    $questionsAndAnswers = [];
    $operations = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $num1 = random_int(1, 50);
        $num2 = random_int(1, 50);
        $operation = $operations[array_rand($operations)];
        $question = "$num1 $operation $num2";
        $answer = calculate($num1, $num2, $operation);
        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame(CALC_RULE, $questionsAndAnswers);
}

/**
 * @throws Exception
 */
function calculate(int $num1, int $num2, string $operation): int
{
    return match ($operation) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => throw new Exception("Unknown operation: $operation"),
    };
}
