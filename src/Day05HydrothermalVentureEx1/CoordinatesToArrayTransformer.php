<?php

declare(strict_types=1);

namespace AdventOfCode\Day05HydrothermalVentureEx1;

class CoordinatesToArrayTransformer
{
    public static function transform(array $coordinateStrings): array
    {
        $ventMap = [];
        foreach ($coordinateStrings as $coordinateString) {
            $cleanCoordinateStrings = str_replace(' -> ', ',', $coordinateString);
            $coordinates = explode(',', $cleanCoordinateStrings);
            for ($x = $coordinates[0]; $x <= $coordinates[2]; $x++) {
                for ($y = $coordinates[1]; $y <= $coordinates[3]; $y++) {
                    if (isset($ventMap[$x][$y])) {
                        $ventMap[$x][$y]++;
                    } else {
                        $ventMap[$x][$y] = 1;
                    }
                }
            }
        }

        return $ventMap;
    }
}
