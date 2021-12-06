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
        return 0;
    }
}
