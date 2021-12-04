<?php

declare(strict_types=1);

namespace AdventOfCode\SonarSweep;

require __DIR__ . '/../../vendor/autoload.php';

use AdventOfCode\Day01SonarSweepEx1\SonarSweep;

$inputMeasurements = file(__DIR__ . '/../depth_variations.csv');

$sonarSweep = new SonarSweep();

$sonarSweep->measurements = $inputMeasurements;

echo $sonarSweep->countIncreasingDepthVariations();
