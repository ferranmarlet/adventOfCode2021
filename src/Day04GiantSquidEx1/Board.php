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

    public static function fromString($stringValues): self
    {
        $cellValues = [];
        $rows = explode("\r", $stringValues);

        $x = 0;
        while ($x < count($rows)) {
            $y = 0;
            while ($y < strlen($rows[$x])) {
                $cellValues[$x][$y] = substr($rows[$x], $y, 1); 
                $y++;
            }
            $x++;
        }
        return new Board($cellValues);
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
        while (!$isBingo && $i < count($this->cellValues)) {
            $isBingo = $this->checkLineForBingo($this->cellValues[$i]);
            $i++;
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
