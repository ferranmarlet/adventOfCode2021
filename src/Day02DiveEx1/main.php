<?php

declare(strict_types=1);

namespace AdventOfCode\DiveEx1;

require __DIR__ . '/../../vendor/autoload.php';

use AdventOfCode\DiveEx1\Submarine;

$inputMeasurements = file(__DIR__ . '/../depth_variations.csv');

$sonarSweep = new SonarSweep();

$sonarSweep->measurements = $inputMeasurements;

echo $sonarSweep->countIncreasingDepthVariations();
