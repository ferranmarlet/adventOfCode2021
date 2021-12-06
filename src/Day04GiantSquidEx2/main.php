<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx2;

use AdventOfCode\Day04GiantSquidEx2\BingoLoserCalculator;
use AdventOfCode\Day04GiantSquidEx2\LosingBoard;

require __DIR__ . '/../../vendor/autoload.php';

$bingoInputString = file_get_contents(__DIR__ . '/bingo.csv');

$bingoInput = explode("\n\n", $bingoInputString);
$drawnNumbers = explode(',', $bingoInput[0]);
array_splice($bingoInput, 0, 1);

$boards = [];
array_walk(
    $bingoInput,
    function ($boardString) use (&$boards) {
        $boards[] = LosingBoard::fromString($boardString);
    });

$bingoLoserCalculator = new BingoLoserCalculator($drawnNumbers, $boards);

echo $bingoLoserCalculator->lose();
