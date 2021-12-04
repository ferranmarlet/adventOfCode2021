<?php

declare(strict_types=1);

namespace AdventOfCode\Day01SonarSweepEx1;

use Exception;

class SonarSweep
{
    public $measurements;

    public function countIncreasingDepthVariations(): int
    {
        if (!is_array($this->measurements)) {
            throw new Exception('Measurements list not provided');
        }

        $totalIncreasingMeasurements = 0;
        for ($i = 1; $i <count($this->measurements); $i++) {
            if ($this->measurements[$i] > $this->measurements[$i-1]) {
                $totalIncreasingMeasurements++;
            }
        }

        return $totalIncreasingMeasurements;
    }
}

