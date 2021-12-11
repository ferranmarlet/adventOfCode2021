<?php

declare(strict_types=1);

namespace AdventOfCode\Day05HydrothermalVentureEx2;

class CoordinatesToArrayTransformerPro
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
        } elseif (self::lineIsDiagonal($coordinates)) {
            $ventMap = self::drawDiagonalLineOnCoordinates($coordinates, $ventMap);

        }
        return $ventMap;
    }

    private static function lineIsStraight(array $coordinates): bool
    {
        return $coordinates['x1'] == $coordinates['x2'] || $coordinates['y1'] == $coordinates['y2'];
    }

    private static function lineIsDiagonal(array $coordinates): bool
    {
        // To know if a line is a diagonal (inclined 45 degrees)
        // we add substract starting and ending position coordinates,
        // if the result satisfies abs|x| = abs|y|, then it's diagonal
        return (abs($coordinates['x1'] - $coordinates['x2'])
            == abs($coordinates['y1'] - $coordinates['y2']));
    }

    private static function drawDiagonalLineOnCoordinates(array $coordinates, array $ventMap): array
    {
        $xStep = ($coordinates['x2'] - $coordinates['x1']) <=> 0;
        $yStep = ($coordinates['y2'] - $coordinates['y1']) <=> 0;

        //var_dump( "x1 = ".$coordinates['x1'].", x2 = ".$coordinates['x2'].", xstep = $xStep \r");
        //var_dump( "y1 = ".$coordinates['y1'].", y2 = ".$coordinates['y2'].", ystep = $yStep \r");

        $x = $coordinates['x1'];
        $y = $coordinates['y1'];
        while ($x != ($coordinates['x2']+$xStep) && $y != ($coordinates['y2']+$yStep)) {
            $ventMap[$x][$y] = isset($ventMap[$x][$y]) ? $ventMap[$x][$y]+1 : 1;
            $x += $xStep;
            $y += $yStep;
        }

        return $ventMap;
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
