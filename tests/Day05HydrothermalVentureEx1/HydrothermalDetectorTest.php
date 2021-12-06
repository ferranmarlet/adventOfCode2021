<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day05HydrothermalVentureEx1\HydrothermalDetector;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class HydrothermalDetectorTest extends TestCase
{
    /** @test */
    public function shouldDetectZeroDangerousSpotsInEmptyMap(): void
    {
        $emptyMap = [];
        $sut = new HydrothermalDetector($emptyMap);
        self::assertEquals(0, $sut->getDangerousSpotCount());
    }

    /** @test */
    public function shouldDetectZeroDangerousSpotsInMapWithOnlyOneVent(): void
    {
        $map = [
            0 => [
                0 => '1'
            ]
        ];
        $sut = new HydrothermalDetector($map);
        self::assertEquals(0, $sut->getDangerousSpotCount());
    }
}
