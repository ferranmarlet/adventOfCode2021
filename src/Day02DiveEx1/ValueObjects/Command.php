<?php

declare(strict_types=1);

namespace AdventOfCode\Day02DiveEx1\ValueObjects;

class Command
{
    public const UP = 'up';
    public const DOWN = 'down';
    public const FORWARD = 'forward';

    private string $direction;
    private int $lenght;

    public function __construct(string $direction, int $lenght) {
        $this->direction = $direction;
        $this->lenght = $lenght;
    }

    public static function fromInputString($inputLine): self
    {
        $lineValues = explode(' ', $inputLine);
        return new Command($lineValues[0], (int)$lineValues[1]);
    }

    public function direction(): string
    {
        return $this->direction;
    }

    public function lenght(): int
    {
        return $this->lenght;
    }
}

