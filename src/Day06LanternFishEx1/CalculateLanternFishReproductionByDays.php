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
        return count($this->initialSchool);
    }
}
