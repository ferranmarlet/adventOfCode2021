<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx1;

use AdventOfCode\Day03BinaryDiagnosticEx1\DiagnosticRecordTransposer;

class PowerConsumptionCalculator
{
    private array $transposedRecords;

    public function __construct(array $diagnosticReport)
    {
        $this->transposedRecords = DiagnosticRecordTransposer::transpose($diagnosticReport);
    }

    public function getPowerConsumption(): int
    {
        $binaryGammaRate = '';
        $binaryEpsilonRate = '';

        foreach ($this->transposedRecords as $record) {
            if (substr_count($record, '1') > strlen($record)/2) {
                $binaryGammaRate .= '1';
                $binaryEpsilonRate .= '0';
            } else {
                $binaryGammaRate .= '0';
                $binaryEpsilonRate .= '1';
            }
        }

        return (bindec($binaryGammaRate) * bindec($binaryEpsilonRate));
    }
}
