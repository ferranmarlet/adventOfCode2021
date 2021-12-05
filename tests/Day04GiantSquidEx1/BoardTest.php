<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day04GiantSquidEx1\Board;

require __DIR__ . '/../../vendor/autoload.php';

class BoardTest extends TestCase
{
    /** @test */
    public function shouldCallBingoWhenAllCellsAreMarked(): void
    {
        $sut = new Board([0 => ['1']]);
        $sut->mark('1');
        self::assertTrue($sut->isBingo());
    }

    /** @test */
    public function shouldNotCallBingoWhenNoCellsAreMarked(): void
    {
        $sut = Board::fromString(
            "12\r".
            "34");

        self::assertFalse($sut->isBingo());
    }

    /** @test */
    public function shouldCallBingoWhenAllCellsInARowAreMarked(): void
    {
        $sut = Board::fromString(
            "12\r".
            "34");
        $sut->mark('1');
        $sut->mark('2');

        self::assertTrue($sut->isBingo());
    }

    /** @test */
    public function shouldCallBingoWhenAllCellsInAColumnAreMarked(): void
    {
        $sut = Board::fromString(
            "12\r".
            "34");
        $sut->mark('1');
        $sut->mark('3');

        self::assertTrue($sut->isBingo());
    }
}
