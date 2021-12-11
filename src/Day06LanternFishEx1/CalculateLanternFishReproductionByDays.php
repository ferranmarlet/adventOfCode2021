<?php

declare(strict_types=1);

namespace AdventOfCode\Day06LanternFishEx1;

class CalculateLanternFishReproductionByDays
{
    private array $initialSchool;

    public function __construct(array $initialSchool)
    {
        $this->initialSchool = $initialSchool;
    }

    public function execute(int $days): int
    {
        $fishByReproductionDays = [];

        foreach ($this->initialSchool as $fishDaysToReproduce) {
            if (!isset($fishByReproductionDays[$fishDaysToReproduce])) {
                $fishByReproductionDays[$fishDaysToReproduce] = 1;
            } else {
                $fishByReproductionDays[$fishDaysToReproduce]++;
            }
        }

        for ($day = 0; $day < $days; $day++) {
            // One day passes
            for ($i = 0; $i <= 8; $i++) {
                $fishByReproductionDays[$i-1] = $fishByReproductionDays[$i] ?? 0;
            }
            $fishByReproductionDays[8] = $fishByReproductionDays[-1] ?? 0;
            $fishByReproductionDays[6] = $fishByReproductionDays[-1] ?? 0;
            $fishByReproductionDays[-1] = 0;
        }
        return array_sum($fishByReproductionDays);
    }
}
