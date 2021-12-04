<?php

declare(strict_types=1);

namespace Tests;

use AdventOfCode\Day03BinaryDiagnosticEx1\DiagnosticRecordTransposer;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../../vendor/autoload.php';

class DiagnosticRecordTransposerTest extends TestCase
{
    /** @test */
    public function shouldTransposeDiagnosticRecord(): void
    {
        $diagnosticReport = [
            '001 ',
            '110 '
        ];
        $expectedResult = [
            '01',
            '01',
            '10'
        ];
        $transposedDiagnosticRecord = DiagnosticRecordTransposer::transpose($diagnosticReport);
        self::assertEquals($expectedResult, $transposedDiagnosticRecord);
    }
}
