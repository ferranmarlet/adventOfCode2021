<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day02DiveEx1\Submarine;
use AdventOfCode\Day02DiveEx1\ValueObjects\Command;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class SubmarineTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroWhenCommandListIsEmpty(): void
    {
        $commandList = [];
        $sut = new Submarine($commandList);
        self::assertEquals(0, $sut->getTotalMovement());
    }

    /** @test */
    public function shouldReturnZeroWhenTotalDepthIsZero(): void
    {
        $commandList = [
            new Command(Command::DOWN, 1),
            new Command(Command::UP, 1),
            new Command(Command::FORWARD, 1)
        ];

        $sut = new Submarine($commandList);
        self::assertEquals(0, $sut->getTotalMovement());
    }

    /** @test */
    public function shouldReturnZeroWhenTotalForwardDistanceIsZero(): void
    {
        $commandList = [
            new Command(Command::DOWN, 1),
            new Command(Command::UP, 1)
        ];

        $sut = new Submarine($commandList);
        self::assertEquals(0, $sut->getTotalMovement());
    }

    /** @test */
    public function shouldReturnMultiplicationOfDepthAndForwardDistance(): void
    {
        $commandList = [
            new Command(Command::DOWN, 2),
            new Command(Command::FORWARD, 2)
        ];

        $sut = new Submarine($commandList);
        self::assertEquals(4, $sut->getTotalMovement());
    }
}
