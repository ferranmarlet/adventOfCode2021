<?php

declare(strict_types=1);

namespace AdventOfCode\Day05HydrothermalVentureEx1;

class HydrothermalDetector
{
    private array $map;

    public function __construct($map)
    {
        $this->map = $map;
    }

    public function getDangerousSpotCount(): int
    {
        $dangerousSpotCount = 0;
        array_walk_recursive(
            $this->map,
            function ($cell) use (&$dangerousSpotCount) {
                if ((int)$cell > 1) {
                    $dangerousSpotCount++;
                }
            }
        );

        return $dangerousSpotCount;
    }
}
