<?php
declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day01SonarSweepEx1\SonarSweep;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class SonarSweepTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroIfThereAreNoMeasurements(): void
    {
        $sut = new SonarSweep();
        $sut->measurements = [];

        self::assertEquals(0, $sut->countIncreasingDepthVariations());
    }

    /** @test */
    public function shouldCountMultipleIncreasingMeasurements(): void
    {
        $sut = new SonarSweep();
        $sut->measurements = [1, 2, 3, 3, 4, 2, 3];

        self::assertEquals(4, $sut->countIncreasingDepthVariations());
    }
}

