<?php

declare(strict_types=1);

namespace AdventOfCode\Day05HydrothermalVentureEx1;

class CoordinatesToArrayTransformer
{
    public static function transform(array $coordinateStrings): array
    {
        $ventMap = [];
        foreach ($coordinateStrings as $coordinateString) {
            $coordinates = self::transformCoordinateStringToCoordinateArray($coordinateString);
            $ventMap = self::drawLineOnCoordinates($coordinates, $ventMap);
        }

        return $ventMap;
    }

    private static function drawLineOnCoordinates(array $coordinates, array $ventMap): array
    {
        if (self::lineIsStraight($coordinates)) {
            $ventMap = self::drawStraightLineOnCoordinates($coordinates, $ventMap);
        }
        return $ventMap;
    }

    private static function lineIsStraight(array $coordinates): bool
    {
        return $coordinates['x1'] == $coordinates['x2'] || $coordinates['y1'] == $coordinates['y2'];
    }

    private static function drawStraightLineOnCoordinates(array $coordinates, array $ventMap): array
    {
        for ($x = $coordinates['x1']; $x <= $coordinates['x2']; $x++) {
            for ($y = $coordinates['y1']; $y <= $coordinates['y2']; $y++) {
                $ventMap[$x][$y] = isset($ventMap[$x][$y]) ? $ventMap[$x][$y]+1 : 1;
            }
        }
        return $ventMap;
    }

    private static function transformCoordinateStringToCoordinateArray(string $coordinateString): array
    {
        $cleanCoordinateStrings = str_replace(' -> ', ',', $coordinateString);
        $coordinates = explode(',', $cleanCoordinateStrings);
        if ($coordinates[0] < $coordinates[2] || $coordinates[1] < $coordinates[3]) {
            $result['x1'] = (int)$coordinates[0];
            $result['y1'] = (int)$coordinates[1];
            $result['x2'] = (int)$coordinates[2];
            $result['y2'] = (int)$coordinates[3];
        } else {
            $result['x1'] = (int)$coordinates[2];
            $result['y1'] = (int)$coordinates[3];
            $result['x2'] = (int)$coordinates[0];
            $result['y2'] = (int)$coordinates[1];
        }
        return $result;
    }
}
