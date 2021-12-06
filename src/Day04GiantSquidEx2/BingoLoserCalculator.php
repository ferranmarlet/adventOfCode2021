<?php

declare(strict_types=1);

namespace AdventOfCode\Day04GiantSquidEx2;

class BingoLoserCalculator
{
    private array $drawnNumbers;
    /** @var LosingBoard[] $boards */
    private array $boards;
    private int $lastWinningBoardScore;

    public function __construct(array $drawnNumbers, array $boards)
    {
        $this->drawnNumbers = $drawnNumbers;
        $this->boards = $boards;
        $this->lastWinningBoardScore = 0;
    }

    public function lose(): int
    {
        foreach ($this->drawnNumbers as $drawnNumber) {
            foreach ($this->boards as &$board) {
                if (!$board->isBingo()) {
                    $board->mark($drawnNumber);
                    if ($board->isBingo()) {
                        $this->lastWinningBoardScore = $board->finalScore();
                    }
                }
            }
        }
        return $this->lastWinningBoardScore;
    }
}
