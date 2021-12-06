<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day05HydrothermalVentureEx1\CoordinatesToArrayTransformer;

require __DIR__ . '/../../vendor/autoload.php';

class CoordinatesToArrayTransformerTest extends TestCase
{
    /** @test */
    public function shouldTransformCoordinateStringsToArray(): void
    {
        $coordinateStrings = [
            '0,9 -> 5,9'
        ];
        $ventArray = CoordinatesToArrayTransformer::transform($coordinateStrings);
        for ($i = 0; $i <= 5; $i++) {
            self::assertEquals(1, $ventArray[$i][9]);
        }
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
        $ventArray = CoordinatesToArrayTransformer::transform($coordinateStrings);
        self::assertEquals(2, $ventArray[7][4]);
    }
}
