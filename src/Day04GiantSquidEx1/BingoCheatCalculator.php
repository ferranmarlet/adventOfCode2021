<?php

declare(strict_types=1);

namespace AdventOfCode\Day04GiantSquidEx1;

class BingoCheatCalculator
{
    private array $drawnNumbers;
    private array $boards;

    public function __construct(array $drawnNumbers, array $boards)
    {
        $this->drawnNumbers = $drawnNumbers;
        $this->boards = $boards;
    }

    public function cheat(): int
    {
        return 0;
    }
}
