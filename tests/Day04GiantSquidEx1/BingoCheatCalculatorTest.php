<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day04GiantSquidEx1\BingoCheatCalculator;

require __DIR__ . '/../../vendor/autoload.php';

class BingoCheatCalculatorTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroUponWinningOnA1x1Board(): void
    {
        $numbersDrawn = ['1'];
        $boards = [
            0 => ['1']
        ];
        $sut = new BingoCheatCalculator($numbersDrawn, $boards);
        self::assertEquals(0, $sut->cheat());
    }

    /** @test */
    public function shouldReturnSumOfUnmarkedNumberPerLastDrawnNumberOnTwoCellBoard(): void
    {
        $numbersDrawn = ['2'];
        $boards = [
            0 => ['1', '2']
        ];
        $sut = new BingoCheatCalculator($numbersDrawn, $boards);
        self::assertEquals(2, $sut->cheat());
    }
}
