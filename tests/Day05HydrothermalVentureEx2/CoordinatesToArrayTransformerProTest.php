<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day05HydrothermalVentureEx2\CoordinatesToArrayTransformerPro;

require __DIR__ . '/../../vendor/autoload.php';

class CoordinatesToArrayTransformerProTest extends TestCase
{
    /** @test */
    public function shouldTransformCoordinateStringsToArray(): void
    {
        $coordinateStrings = [
            '0,9 -> 5,9'
        ];
        $ventArray = CoordinatesToArrayTransformerPro::transform($coordinateStrings);
        for ($i = 0; $i <= 5; $i++) {
            self::assertEquals(1, $ventArray[$i][9]);
        }
    }

    /** @test */
    public function shouldOverlapHorizontalAndVerticalVents(): void
    {
        $coordinateStrings = [
            '0,0 -> 9,0',
            '5,0 -> 5,2'
        ];

        $ventArray = CoordinatesToArrayTransformerPro::transform($coordinateStrings);
        self::assertEquals(2, $ventArray[5][0]);
    }

    /** @test */
    public function shouldOverlapDiagonalVents(): void
    {
        // These two lines form a cross with its center on cell 4,4
        $coordinateStrings = [
            '0,0 -> 9,9',
            '3,5 -> 5,3',
            '5,3 -> 6,2' // Edge case, the two vents overlap on the begining/ending coordinates
        ];

        $ventArray = CoordinatesToArrayTransformerPro::transform($coordinateStrings);
        self::assertEquals(2, $ventArray[4][4]);
    }

    /** @test */
    public function shouldOverlapVentsOnArray(): void
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
        $ventArray = CoordinatesToArrayTransformerPro::transform($coordinateStrings);
        self::assertEquals(2, $ventArray[7][4]);
    }
}
