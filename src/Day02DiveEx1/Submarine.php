<?php

declare(strict_types=1);

namespace AdventOfCode\Day02DiveEx1;

class Submarine
{
    private $commandList;

    public function __construct($commandList) {
        $this->commandList = $commandList;
    }

    public function getTotalMovement(): int
    {
        return 0;
    }
}
