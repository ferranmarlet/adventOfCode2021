<?php

declare(strict_types=1);

namespace AdventOfCode\Day04GiantSquidEx2;

class BoardTransposer
{
    public static function transpose(array $board): array
    {
        $transposedBoard = [];

        foreach ($board as $row) {
            for ($i = 0; $i < count($row); $i++) {
                $transposedBoard[$i][] = $row[$i];
            }
        }

        return $transposedBoard;
    }
}

