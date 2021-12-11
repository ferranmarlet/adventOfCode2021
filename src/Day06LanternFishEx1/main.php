<?php

declare(strict_types=1);

namespace AdventOfCode\Day06LanternFishEx1;

require __DIR__ . '/../../vendor/autoload.php';

$initialSchoolInput = file(__DIR__ . '/school.csv');

$initialSchoolInput[0] = str_replace("\r", '', $initialSchoolInput[0]);
$initialSchoolInput[0] = str_replace("\n", '', $initialSchoolInput[0]);
$initialSchool = explode(',', $initialSchoolInput[0]);

$calculateFishReproductionByDays = new CalculateLanternFishReproductionByDays($initialSchool);

echo $calculateFishReproductionByDays->execute(256);
