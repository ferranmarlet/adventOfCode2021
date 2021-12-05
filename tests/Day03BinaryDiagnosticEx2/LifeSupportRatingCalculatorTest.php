<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day03BinaryDiagnosticEx2\LifeSupportRatingCalculator;

require __DIR__ . '/../../vendor/autoload.php';

class LifeSupportRatingCalculatorTest extends TestCase
{
    /** @test */
    public function shouldReturnLifeSupportRating(): void
    {
        $records = [
            '00100',
            '11110',
            '10110',
            '10111',
            '10101',
            '01111',
            '00111',
            '11100',
            '10000',
            '11001',
            '00010',
            '01010'
        ];

        $sut = new LifeSupportRatingCalculator($records);
        $result = $sut->execute();
        self::assertEquals(230, $result);
    }
}
