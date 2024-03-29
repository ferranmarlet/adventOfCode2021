<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day06LanternFishEx1\CalculateLanternFishReproductionByDays;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class CalculateLanternFishReproductionByDaysTest extends TestCase
{
    /** @test */
    public function whenTheNumberOfFishIsZeroShouldRemainZeroTheNextDay(): void
    {
        // A school is also a group of fish
        $initialSchool = [];
        $reproductionDays = 1;
        $sut = new CalculateLanternFishReproductionByDays($initialSchool);
        $resultingFishAmount = $sut->execute($reproductionDays);
        self::assertEquals(0, $resultingFishAmount);
    }

    /** @test */
    public function shouldReturnSameNumberOfFishWhenThereIsNoTimeToReproduce(): void
    {
        $initialSchool = [6];
        $reproductionDays = 6;
        $sut = new CalculateLanternFishReproductionByDays($initialSchool);
        $resultingFishAmount = $sut->execute($reproductionDays);
        self::assertEquals(1, $resultingFishAmount);
    }

    /** @test */
    public function shouldReturnOneMoreFishAfterReproduction(): void
    {
        $initialSchool = [6];
        $reproductionDays = 7;
        $sut = new CalculateLanternFishReproductionByDays($initialSchool);
        $resultingFishAmount = $sut->execute($reproductionDays);
        self::assertEquals(2, $resultingFishAmount);
    }

    /** @test */
    public function shouldReturnTotalFishAmountAfterReproductionDays(): void
    {
        $initialSchool = [3,4,3,1,2];
        $reproductionDays = 80;
        $sut = new CalculateLanternFishReproductionByDays($initialSchool);
        $resultingFishAmount = $sut->execute($reproductionDays);
        self::assertEquals(5934, $resultingFishAmount);
    }
}
