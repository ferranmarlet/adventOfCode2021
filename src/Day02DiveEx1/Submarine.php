<?php

declare(strict_types=1);

namespace AdventOfCode\Day02DiveEx1;

use AdventOfCode\Day02DiveEx1\ValueObjects\Command;

class Submarine
{
    private array $commandList;

    public function __construct(array $commandList) {
        $this->commandList = $commandList;
    }

    public function getTotalMovement(): int
    {
        return 0;
    }
}
