<?php

declare(strict_types=1);

namespace AdventOfCode\DiveEx1;

require __DIR__ . '/../../vendor/autoload.php';

use AdventOfCode\Day02DiveEx1\ValueObjects\Command;
use AdventOfCode\Day02DiveEx1\Submarine;

$inputLines = file(__DIR__ . '/commands.csv');

$commandList = array_map(function ($inputLine) {
    return Command::fromInputString($inputLine);
}, $inputLines);

$submarine = new Submarine($commandList);

echo $submarine->getTotalMovement();
