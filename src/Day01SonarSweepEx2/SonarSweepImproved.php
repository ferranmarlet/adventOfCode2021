<?php

declare(strict_types=1);

namespace AdventOfCode\Day01SonarSweepEx2;

use Exception;

class SonarSweepImproved
{
    public $measurements;

    public function countIncreasingDepthVariations(): int
    {
        if (!is_array($this->measurements)) {
            throw new Exception('Measurements list not provided');
        }

        $totalIncreasingMeasurements = 0;
        for ($i = 3; $i <count($this->measurements); $i++) {
            if ($this->getNthGroupMeasurementSum($i) > $this->getNthGroupMeasurementSum($i-1)) {
                $totalIncreasingMeasurements++;
            }
        }

        return $totalIncreasingMeasurements;
    }

    private function getNthGroupMeasurementSum(int $lastGroupMeasurement): int
    {
        return $this->measurements[$lastGroupMeasurement-2]
            + $this->measurements[$lastGroupMeasurement-1]
            + $this->measurements[$lastGroupMeasurement];
    }
}

