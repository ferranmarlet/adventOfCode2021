<?php
declare(strict_types=1);

namespace Tests;

use AdventOfCode\SonarSweep\SonarSweep;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';

class SonarSweepTest extends TestCase
{
    /** @test */
    public function shouldReturnZeroIfThereAreNoMeasurements(): void
    {
        $sut = new SonarSweep();
        $sut->measurements = [];

        self::assertEquals(0, $sut->countIncreasingDepthVariations());
    }
}

