<?php

declare(strict_types=1);

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $rule, array $questionsAndAnswers): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rule);

    foreach ($questionsAndAnswers as [$question, $correctAnswer]) {
        line('Question: %s', $question);
        $answer = prompt('Your answer');

        if ($answer !== (string)$correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);

            return;
        }
        line('Correct!');
    }
    line("Congratulations, %s!", $name);
}
