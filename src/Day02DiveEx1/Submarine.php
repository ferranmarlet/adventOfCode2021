<?php

declare(strict_types=1);

namespace AdventOfCode\Day02DiveEx1;

use AdventOfCode\Day02DiveEx1\ValueObjects\Command;

class Submarine
{
    /** @var Command[] */
    private array $commandList;
    private int $forwardDistance;
    private int $depth;

    public function __construct(array $commandList) {
        $this->commandList = $commandList;
        $this->forwardDistance = 0;
        $this->depth = 0;
    }

    public function getTotalMovement(): int
    {
        foreach ($this->commandList as $command) {
            if ($command->direction() === Command::FORWARD) {
                $this->forwardDistance += $command->lenght();
            } elseif ($command->direction() === Command::DOWN) {
                $this->depth += $command->lenght();
            } elseif ($command->direction() === Command::UP) {
                $this->depth -= $command->lenght();
            }
        }

        return $this->depth * $this->forwardDistance;
    }
}
