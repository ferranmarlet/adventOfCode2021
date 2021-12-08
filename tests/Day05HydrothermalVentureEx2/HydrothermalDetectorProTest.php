<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day05HydrothermalVentureEx2\CoordinatesToArrayTransformerPro;
use AdventOfCode\Day05HydrothermalVentureEx2\HydrothermalDetectorPro;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class HydrothermalDetectorProTest extends TestCase
{
    /** @test */
    public function shouldDetectZeroDangerousSpotsInEmptyMap(): void
    {
        $emptyMap = [];
        $sut = new HydrothermalDetectorPro($emptyMap);
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
        $sut = new HydrothermalDetectorPro($map);
        self::assertEquals(0, $sut->getDangerousSpotCount());
    }

    /** @test */
    public function shouldDetectOneDangerousSpot(): void
    {
        $map = [
            0 => [
                0 => '2'
            ]
        ];
        $sut = new HydrothermalDetectorPro($map);
        self::assertEquals(1, $sut->getDangerousSpotCount());
    }

    /** @test */
    public function shouldDetectMultipledangerousSpotsOnVerticalAndHorizontalLinesOnly(): void
    {
        $coordinateStrings = [
            '0,9 -> 5,9',
            '8,0 -> 0,8',
            '9,4 -> 3,4',
            '2,2 -> 2,1',
            '7,0 -> 7,4',
            '6,4 -> 2,0',
            '0,9 -> 2,9',
            '3,4 -> 1,4',
            '0,0 -> 8,8',
            '5,5 -> 8,2'
        ];
        $map = CoordinatesToArrayTransformerPro::transform($coordinateStrings);
        $sut = new HydrothermalDetectorPro($map);
        self::assertEquals(5, $sut->getDangerousSpotCount());
    }
}
