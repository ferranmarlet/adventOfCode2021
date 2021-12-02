<?php

declare(strict_types=1);

namespace AdventOfCode\SonarSweep;

use Exception;

class SonarSweep
{
    public $measurements;

    public function countIncreasingDepthVariations(): int
    {
        if (!is_array($this->measurements)) {
            throw new Exception('Measurements list not provided');
        }

        return 0;
    }
}

