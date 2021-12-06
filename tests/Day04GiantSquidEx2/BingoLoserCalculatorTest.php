<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day04GiantSquidEx2\BingoLoserCalculator;
use PHPUnit\Framework\TestCase;
use AdventOfCode\Day04GiantSquidEx2\LosingBoard;

require __DIR__ . '/../../vendor/autoload.php';

class BingoLoserCalculatorTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroUponWinningOnA1x1Board(): void
    {
        $numbersDrawn = ['1'];
        $boards = [
            LosingBoard::fromString('1')
        ];
        $sut = new BingoLoserCalculator($numbersDrawn, $boards);
        self::assertEquals(0, $sut->lose());
    }

    /** @test */
    public function shouldReturnSumOfUnmarkedNumberPerLastDrawnNumberOnTwoCellBoard(): void
    {
        $numbersDrawn = ['2'];
        $boards = [
            LosingBoard::fromString('1 2')
        ];
        $sut = new BingoLoserCalculator($numbersDrawn, $boards);
        self::assertEquals(2, $sut->lose());
    }

    /** @test */
    public function shouldReturnSumOfUnmarkedNumbersOfLastWinningBoard(): void
    {
        $numbersDrawn = ['2','1'];
        $boards = [
            LosingBoard::fromString('1 2'),
            LosingBoard::fromString('1 3')
        ];
        $sut = new BingoLoserCalculator($numbersDrawn, $boards);
        self::assertEquals(3, $sut->lose());
    }
}
