<?php

declare(strict_types=1);

namespace AdventOfCode\Day02DiveEx2\ValueObjects;

class Command
{
    public const UP = 'up';
    public const DOWN = 'down';
    public const FORWARD = 'forward';

    private string $direction;
    private int $value;

    public function __construct(string $direction, int $value) {
        $this->direction = $direction;
        $this->value = $value;
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

    public function value(): int
    {
        return $this->value;
    }
}

