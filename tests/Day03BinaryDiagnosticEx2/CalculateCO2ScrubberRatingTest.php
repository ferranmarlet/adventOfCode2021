<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day03BinaryDiagnosticEx2\CalculateCO2ScrubberRating;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class CalculateCO2ScrubberRatingTest extends TestCase
{
    /** @test */
    public function shouldReturnFirstBitWhenThereIsOneRecord(): void
    {
        $records = ['1'];
        $sut = new CalculateCO2ScrubberRating();
        $result = $sut->execute($records);
        $expectedResult = '1';
        self::assertEquals($expectedResult, $result);
    }

    /** @test */
    public function shouldReturnRecordWithLeastCommonBitOnFirstAndSecondColumns(): void
    {
        $records = [
            '10',
            '11',
            '00',
            '11',
            '00',
            '00',
            '00'
        ];
        $sut = new CalculateCO2ScrubberRating();
        $result = $sut->execute($records);
        $expectedResult = '10';
        self::assertEquals($expectedResult, $result);
    }

    /** @test */
    public function shouldReturnLeastCommonBitOnColumn(): void
    {
        $records = [
            '10',
            '10',
            '00',
            '01'
        ];
        $sut = new CalculateCO2ScrubberRating();
        $result = $sut->getLeastCommonDigitOnRecordsColumn($records, 0);
        $expectedResult = '0';
        self::assertEquals($expectedResult, $result);
        $result = $sut->getLeastCommonDigitOnRecordsColumn($records, 1);
        $expectedResult = '1';
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
        $sut = new CalculateCO2ScrubberRating();
        $result = $sut->extractRecordsWhitLeastCommonBitOnColumn($records, $filterBit, 0);
        $expectedResult = [
            '10',
            '10'
        ];
        self::assertEquals($expectedResult, $result);
        $filterBit = 0;
        $result = $sut->extractRecordsWhitLeastCommonBitOnColumn($records, $filterBit, 1);
        $expectedResult = [
            '10',
            '10',
            '00'
        ];
        self::assertEquals($expectedResult, $result);
    }
}
