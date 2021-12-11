<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day06LanternFishEx1\CalculateLanternFishReproductionByDays;

require __DIR__ . '/../../vendor/autoload.php';

class LanternFishReproductionCalculatorTest extends TestCase
{
    /** @test */
    public function whenTheNumberOfFishIsZeroShouldRemainZeroTheNextDay(): void
    {
        // A school is also a group of fish
        $initialSchool = [0];
        $reproductionDays = 1;
        $sut = new LanternFishReproductionCalculator($initialSchool);
        $resultingFishAmount = $sut->execute($reproductionDays);
    }
}
