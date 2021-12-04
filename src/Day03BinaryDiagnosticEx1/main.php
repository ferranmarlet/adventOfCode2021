<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx1;

require __DIR__ . '/../../vendor/autoload.php';

$diagnosticReport = file(__DIR__ . '/diagnostic_report.csv');

$powerConsumptionCalculator = new PowerConsumptionCalculator($diagnosticReport);

echo $powerConsumptionCalculator->getPowerConsumption();
