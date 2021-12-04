<?php

declare(strict_types=1);

namespace AdventOfCode\DiveEx2;

require __DIR__ . '/../../vendor/autoload.php';

use AdventOfCode\Day02DiveEx2\ValueObjects\Command;
use AdventOfCode\Day02DiveEx2\SubmarineImproved;

$inputLines = file(__DIR__ . '/commands.csv');

$commandList = array_map(function ($inputLine) {
    return Command::fromInputString($inputLine);
}, $inputLines);

$submarine = new SubmarineImproved($commandList);

echo $submarine->getTotalMovement();
