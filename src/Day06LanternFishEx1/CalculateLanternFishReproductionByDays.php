<?php

declare(strict_types=1);

namespace AdventOfCode\Day06LanternFishEx1;

class CalculateLanternFishReproductionByDays
{
    private array $fishByRemainingDaysToReproduce;

    public function __construct(array $initialSchool)
    {
        $this->distributeFishByRemainigDaysToReproduce($initialSchool);
    }

    public function execute(int $days): int
    {
        for ($day = 0; $day < $days; $day++) {
            $this->advanceOneDayToReproduction();
        }
        echo $days;
        return array_sum($this->fishByRemainingDaysToReproduce);
    }

    private function distributeFishByRemainigDaysToReproduce($school): void
    {
        $this->fishByRemainingDaysToReproduce = [];

        foreach ($school as $daysToReproduce) {
            if (!isset($this->fishByRemainingDaysToReproduce[$daysToReproduce])) {
                $this->fishByRemainingDaysToReproduce[$daysToReproduce] = 1;
            } else {
                $this->fishByRemainingDaysToReproduce[$daysToReproduce]++;
            }
        }
    }

    private function advanceOneDayToReproduction(): void
    {
        for ($i = 0; $i <= 8; $i++) {
            $this->fishByRemainingDaysToReproduce[$i-1] = $this->fishByRemainingDaysToReproduce[$i] ?? 0;
        }
        $this->addNewbornFishToSchool($this->fishByRemainingDaysToReproduce[-1] ?? 0);
        $this->restartAdultFishReproductionCycle($this->fishByRemainingDaysToReproduce[-1] ?? 0);
        $this->fishByRemainingDaysToReproduce[-1] = 0;
    }

    private function addNewbornFishToSchool(int $newFishAmount): void
    {
        $this->fishByRemainingDaysToReproduce[8] = $newFishAmount;
    }

    private function restartAdultFishReproductionCycle(int $fishAmount): void
    {
        $this->fishByRemainingDaysToReproduce[6] += $fishAmount;
    }
}
