<?php

declare(strict_types=1);

namespace AdventOfCode\Day04GiantSquidEx1;

class Board
{
    private array $cellValues;

    public function __construct(array $cellValues)
    {
        $this->cellValues = $cellValues;
    }

    public function mark(string $number): void
    {
        array_walk_recursive(
            $this->cellValues,
            function(&$item) use ($number) {
                if ($item === $number) {
                    $item = 'x';
                }
            }
        );
    }

    public function isBingo(): bool
    {
        $isBingo = false;
        $i = 0;
        while (!$isBingo && $i <= count($this->cellValues)) {
            $isBingo = $this->checkLineForBingo($this->cellValues[$i]);
        }

        return $isBingo;
    }

    private function checkLineForBingo(array $line): bool
    {
        $isBingo = true;
        array_walk(
            $line,
            function($cell) use (&$isBingo) {
                if ($cell !== 'x') {
                    $isBingo = false;
                }
            }
        );
        return $isBingo;
    }
}
