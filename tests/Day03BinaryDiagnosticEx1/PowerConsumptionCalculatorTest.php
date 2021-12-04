<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day03BinaryDiagnosticEx1\PowerConsumptionCalculator;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class PowerConsumptionCalculatorTest extends TestCase
{
    // Not testing for emtpy input because we will always control the input in this exercise

    /** @test */
    public function shouldReturnZeroWhenAllBitsAreZeroes(): void
    {
        $diagnosticReport = [
            '00000',
            '00000',
        ];
        $sut = new PowerConsumptionCalculator($diagnosticReport);
        self::assertEquals(0, $sut->getPowerConsumption());
    }
}
