<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use AdventOfCode\Day03BinaryDiagnosticEx2\CalculateOxygenGeneratorRating;

require __DIR__ . '/../../vendor/autoload.php';

class CalculateOxygenGeneratorRatingTest extends TestCase
{
    /** @test */
    public function shouldReturnFirstBitWhenThereIsOneRecord(): void
    {
        $records = ['1'];
        $sut = new CalculateOxygenGeneratorRating();
        $result = $sut->execute($records);
        $expectedResult = '1';
        self::assertEquals($expectedResult, $result);
    }

    /** @test */
    public function shouldReturnRecordWithMostCommonBitOnFirstAndSecondColumns(): void
    {
        $records = [
            '10',
            '00',
            '00'
        ];
        $sut = new CalculateOxygenGeneratorRating();
        $result = $sut->execute($records);
        $expectedResult = '00';
        self::assertEquals($expectedResult, $result);
    }

    /** @test */
    public function shouldReturnMostCommonBitOnColumn(): void
    {
        $records = [
            '10',
            '10',
            '00',
            '01'
        ];
        $sut = new CalculateOxygenGeneratorRating();
        $result = $sut->getMostCommonDigitOnRecordsColumn($records, 0);
        $expectedResult = '1';
        self::assertEquals($expectedResult, $result);
        $result = $sut->getMostCommonDigitOnRecordsColumn($records, 1);
        $expectedResult = '0';
        self::assertEquals($expectedResult, $result);
    }

    /** @test */
    public function shouldExtratRecordsThatContainChoosenBitOnColumn(): void
    {
        $records = [
            '10',
            '10',
            '00',
            '01'
        ];

        $filterBit = 1;
        $sut = new CalculateOxygenGeneratorRating();
        $result = $sut->extractRecordsWhitMostCommonBitOnColumn($records, $filterBit, 0);
        $expectedResult = [
            '10',
            '10'
        ];
        self::assertEquals($expectedResult, $result);
        $filterBit = 0;
        $result = $sut->extractRecordsWhitMostCommonBitOnColumn($records, $filterBit, 1);
        $expectedResult = [
            '10',
            '10',
            '00'
        ];
        self::assertEquals($expectedResult, $result);
    }
}
