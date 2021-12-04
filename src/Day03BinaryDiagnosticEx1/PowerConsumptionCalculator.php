<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx1;

class PowerConsumptionCalculator
{
    private array $diagnosticReport;
    private array $onesOcurrencesByColumn;

    public function __construct(array $diagnosticReport)
    {
        $this->diagnosticReport = $diagnosticReport;
        for ($i = 0; $i < count(str_split($diagnosticReport[0])); $i++) {
            $this->onesOcurrencesByColumn[$i] = 0;
        }
    }

    public function getPowerConsumption(): int
    {
        foreach ($this->diagnosticReport as $binaryEntry) {
            $binaryCharacters = str_split($binaryEntry);

            for ($i = 0; $i < count($binaryCharacters); $i++) {
                $this->onesOcurrencesByColumn[$i] += $binaryCharacters[$i];
            }
        }

        $binaryGammaRate = $this->calculateBinaryGammaRate();
        $binaryEpsilonRate = $this->calculateBinaryEpsilonRate($binaryGammaRate);
        return (bindec($binaryGammaRate) * bindec($binaryEpsilonRate));
    }

    private function calculateBinaryGammaRate(): string
    {
        $gammaRate = '';
        for ($i = 0; $i < count($this->onesOcurrencesByColumn); $i++) {
            if ($this->onesOcurrencesByColumn[$i] > count($this->diagnosticReport)/2) {
                $gammaRate .= '1';
            } else {
                $gammaRate .= '0';
            }
        }

        return $gammaRate;
    }

    private function calculateBinaryEpsilonRate(string $binaryGammaRate): string
    {
        return strtr($binaryGammaRate, '01', '10');
    }
}
