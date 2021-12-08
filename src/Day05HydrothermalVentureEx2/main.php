<?php

declare(strict_types=1);

namespace AdventOfCode\Day05HydrothermalVentureEx1;

use AdventOfCode\Day05HydrothermalVentureEx1\CoordinatesToArrayTransformer;

require __DIR__ . '/../../vendor/autoload.php';

$coordinatesInput = file(__DIR__ . '/vent_coordinates.csv');

$coordinatesArray = CoordinatesToArrayTransformer::transform($coordinatesInput);

$hydrothermalDetector = new HydrothermalDetector($coordinatesArray);

echo $hydrothermalDetector->getDangerousSpotCount();
