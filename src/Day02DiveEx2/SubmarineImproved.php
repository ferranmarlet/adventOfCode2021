<?php

declare(strict_types=1);

namespace AdventOfCode\Day02DiveEx2;

use AdventOfCode\Day02DiveEx2\ValueObjects\Command;

class SubmarineImproved
{
    /** @var Command[] */
    private array $commandList;
    private int $forwardDistance;
    private int $depth;
    private int $aim;

    public function __construct(array $commandList) {
        $this->commandList = $commandList;
        $this->forwardDistance = 0;
        $this->depth = 0;
        $this->aim = 0;
    }

    public function getTotalMovement(): int
    {
        foreach ($this->commandList as $command) {
            if ($command->direction() === Command::FORWARD) {
                $this->forwardDistance += $command->value();
                $this->depth += $command->value() * $this->aim;
            } elseif ($command->direction() === Command::DOWN) {
                $this->aim += $command->value();
            } elseif ($command->direction() === Command::UP) {
                $this->aim -= $command->value();
            }
        }

        return $this->depth * $this->forwardDistance;
    }
}
