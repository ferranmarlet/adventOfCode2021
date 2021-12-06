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
}
