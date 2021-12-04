<?php
declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day01SonarSweepEx2\SonarSweepImproved;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class SonarSweepImprovedTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroIfThereAreNoMeasurements(): void
    {
        $sut = new SonarSweepImproved();
        $sut->measurements = [];

        self::assertEquals(0, $sut->countIncreasingDepthVariations());
    }

    /** @test */
    public function shouldReturnZeroIfThereAre3Measurements(): void
    {
        $sut = new SonarSweepImproved();
        $sut->measurements = [1, 2, 3];

        self::assertEquals(0, $sut->countIncreasingDepthVariations());
    }

    /** @test */
    public function shouldReturnOneWhenThereIsOnlyOneIncreasingGroupOfMeasurements(): void
    {
        $sut = new SonarSweepImproved();
        $sut->measurements = [1, 1, 1, 2];

        self::assertEquals(1, $sut->countIncreasingDepthVariations());
    }
}

