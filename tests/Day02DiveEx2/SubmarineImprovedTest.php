<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day02DiveEx2\SubmarineImproved;
use AdventOfCode\Day02DiveEx2\ValueObjects\Command;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class SubmarineImprovedTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroWhenCommandListIsEmpty(): void
    {
        $commandList = [];
        $sut = new SubmarineImproved($commandList);
        self::assertEquals(0, $sut->getTotalMovement());
    }

    /** @test */
    public function shouldReturnZeroWhenTotalForwardDistanceIsZero(): void
    {
        $commandList = [
            new Command(Command::DOWN, 1),
            new Command(Command::UP, 1)
        ];

        $sut = new SubmarineImproved($commandList);
        self::assertEquals(0, $sut->getTotalMovement());
    }

    /** @test */
    public function shouldReturnMultiplicationOfDepthAndForwardDistanceForOneAdvancement(): void
    {
        $commandList = [
            new Command(Command::DOWN, 1),
            new Command(Command::FORWARD, 2)
        ];

        $sut = new SubmarineImproved($commandList);
        self::assertEquals(4, $sut->getTotalMovement());
    }

    /** @test */
    public function shouldIncreaseDepthWhenAimingDownwardsAndMovingForward(): void
    {
        $commandList = [
            new Command(Command::DOWN, 10),
            new Command(Command::FORWARD, 2)
        ];

        $sut = new SubmarineImproved($commandList);
        self::assertEquals(40, $sut->getTotalMovement());
    }

    /** @test */
    public function shouldAdjustDepthBetweenForwardMovementsWhenMovingMultipleTimes(): void
    {
        $commandList = [
            new Command(Command::DOWN, 10),
            new Command(Command::FORWARD, 2),
            new Command(Command::UP, 2),
            new Command(Command::FORWARD, 5),
        ];

        $sut = new SubmarineImproved($commandList);
        self::assertEquals(420, $sut->getTotalMovement());
    }
}
