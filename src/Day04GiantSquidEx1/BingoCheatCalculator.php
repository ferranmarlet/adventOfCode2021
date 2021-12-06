<?php

declare(strict_types=1);

namespace AdventOfCode\Day04GiantSquidEx1;

class BingoCheatCalculator
{
    private array $drawnNumbers;
    /** @var Board[] $boards */
    public array $boards;

    public function __construct(array $drawnNumbers, array $boards)
    {
        $this->drawnNumbers = $drawnNumbers;
        $this->boards = $boards;
    }

    public function cheat(): int
    {
        $i = 0;
        $isBingo = false;
        while ($i < count($this->drawnNumbers) && !$isBingo) {
            foreach ($this->boards as &$board) {
                $board->mark($this->drawnNumbers[$i]);
                if ($board->isBingo()) {
                    $isBingo = true;
                    return $this->drawnNumbers[$i] * $board->getRemainingNumbersSum();
                }
            }
            $i++;
        }
        return 0;
    }
}
