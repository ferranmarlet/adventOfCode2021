<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx1;

class PowerConsumptionCalculator
{
    private $diagnosticReport;

    public function __construct($diagnosticReport)
    {
        $this->diagnosticReport = $diagnosticReport;
    }

    public function getPowerConsumption(): int
    {
        return 0;
    }
}
