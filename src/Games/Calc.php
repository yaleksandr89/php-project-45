<?php

declare(strict_types=1);

namespace BrainGames\Games;

use RuntimeException;

use function BrainGames\runGame;

function runCalcGame(): void
{
    $rule = 'What is the result of the expression?';
    $questionsAndAnswers = [];
    $operations = ['+', '-', '*'];
    $roundsCount = 3;

    for ($i = 0; $i < $roundsCount; $i++) {
        $num1 = random_int(1, 50);
        $num2 = random_int(1, 50);
        $operation = $operations[array_rand($operations)];
        $question = "$num1 $operation $num2";
        $answer = calculate($num1, $num2, $operation);
        $questionsAndAnswers[] = [$question, $answer];
    }

    runGame($rule, $questionsAndAnswers);
}

function calculate(int $num1, int $num2, string $operation): int
{
    return match ($operation) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => throw new RuntimeException("Unknown operation: $operation"),
    };
}
