<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx2;

require __DIR__ . '/../../vendor/autoload.php';

$diagnosticReport = file(__DIR__ . '/diagnostic_report.csv');

$lifeSupportCalculator = new LifeSupportRatingCalculator($diagnosticReport);

echo $lifeSupportCalculator->execute();
