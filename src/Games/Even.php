<?php

declare(strict_types=1);

namespace BrainGames\Games;

use Random\RandomException;

use function cli\line;
use function cli\prompt;

/**
 * @throws RandomException
 */
function runEvenGame(): void
{
    $roundCount = 3;
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < $roundCount; ++$i) {
        $number = random_int(0, 100);
        line("Question: %d\n", $number);
        $answer = prompt('Your answer');
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
