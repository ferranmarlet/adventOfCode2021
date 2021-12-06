<?php

declare(strict_types=1);

namespace AdventOfCode\Day04GiantSquidEx2;

class LosingBoard
{
    private array $cellValues;
    private bool $isBingo;
    private int $finalScore;

    public function __construct(array $cellValues)
    {
        $this->cellValues = $cellValues;
        $this->isBingo = false;
    }

    public static function fromString($stringValues): self
    {
        $cellValues = [];
        $stringValues = str_replace('  ', ' ', $stringValues);
        $rows = explode("\n", $stringValues);

        $x = 0;
        while ($x < count($rows)) {
            if ($rows[$x] != '') {
                $cellValues[$x] = explode(' ', trim($rows[$x]));
            }
            $x++;
        }
        return new LosingBoard($cellValues);
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
        $this->isBingo = $this->checkLinesForBingo() || $this->checkColumnsForBingo();
        if ($this->isBingo && !isset($this->finalScore)) {
            $this->finalScore = $this->getRemainingNumbersSum() * $number;
        }
    }

    public function isBingo(): bool
    {
        return $this->isBingo;
    }

    public function finalScore(): int
    {
        return $this->finalScore;
    }

    private function getRemainingNumbersSum(): int
    {
        $sum = 0;
        array_walk_recursive(
            $this->cellValues,
            function($cell) use (&$sum) {
                if ($cell !== 'x') {
                    $sum += (int)$cell;
                }
            }
        );
        return $sum;
    }

    private function checkLinesForBingo(): bool
    {
        $isBingo = false;
        $i = 0;
        while (!$isBingo && $i < count($this->cellValues)) {
            $isBingo = $this->checkSingleLineForBingo($this->cellValues[$i]);
            $i++;
        }

        return $isBingo;
    }

    private function checkSingleLineForBingo(array $line): bool
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

    private function checkColumnsForBingo(): bool
    {
        $isBingo = false;
        $transposedCellValues = BoardTransposer::transpose($this->cellValues);
        $i = 0;
        while (!$isBingo && $i < count($transposedCellValues)) {
            $isBingo = $this->checkSingleLineForBingo($transposedCellValues[$i]);
            $i++;
        }

        return $isBingo;
    }
}
