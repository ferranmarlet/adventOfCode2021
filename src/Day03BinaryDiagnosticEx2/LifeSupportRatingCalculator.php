<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx2;

class LifeSupportRatingCalculator
{
    private array $records;

    public function __construct(array $records)
    {
        $this->records = $records;
    }

    public function execute(): int
    {
        $calculateOxygenRating = new CalculateOxygenGeneratorRating();
        $calculateCO2Rating = new CalculateCO2ScrubberRating();
        $oxygenBinaryRating = $calculateOxygenRating->execute($this->records);
        $CO2BinaryRating = $calculateCO2Rating->execute($this->records);

        return bindec($oxygenBinaryRating) * bindec($CO2BinaryRating);
    }
}
