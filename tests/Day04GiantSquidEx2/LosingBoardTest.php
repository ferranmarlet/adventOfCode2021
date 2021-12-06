<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day04GiantSquidEx2\LosingBoard;

require __DIR__ . '/../../vendor/autoload.php';

class LosingBoardTest extends TestCase
{
    /** @test */
    public function shouldCallBingoWhenAllCellsAreMarked(): void
    {
        $sut = new LosingBoard([0 => ['1']]);
        $sut->mark('1');
        self::assertTrue($sut->isBingo());
    }

    /** @test */
    public function shouldNotCallBingoWhenNoCellsAreMarked(): void
    {
        $sut = LosingBoard::fromString(
            "1 2\n".
            "3 4");

        self::assertFalse($sut->isBingo());
    }

    /** @test */
    public function shouldCallBingoWhenAllCellsInARowAreMarked(): void
    {
        $sut = LosingBoard::fromString(
            "1 2\n".
            "3 4");
        $sut->mark('1');
        $sut->mark('2');

        self::assertTrue($sut->isBingo());
    }

    /** @test */
    public function shouldCallBingoWhenAllCellsInAColumnAreMarked(): void
    {
        $sut = LosingBoard::fromString(
            "1 2\n".
            "3 4");
        $sut->mark('1');
        $sut->mark('3');

        self::assertTrue($sut->isBingo());
    }

    /** @test */
    public function shouldStoreFinalScoreWhenCallsBingo(): void
    {
        $sut = LosingBoard::fromString(
            "1 2\n".
            "3 4");
        $sut->mark('1');
        $sut->mark('3');

        self::assertEquals((2+4) * 3, $sut->finalScore());
    }
}
