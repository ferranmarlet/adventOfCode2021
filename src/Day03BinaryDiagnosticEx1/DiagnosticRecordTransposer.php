<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx1;

class DiagnosticRecordTransposer
{
    public static function transpose(array $diagnosticReport): array
    {
        $transposedDiagnostic = [];

        foreach ($diagnosticReport as $binaryEntry) {
            $binaryCharacters = str_split($binaryEntry);

            // Using count($binaryCharacters) -1 
            // because the line break at the end adds a new element to the array 
            for ($i = 0; $i < count($binaryCharacters)-1; $i++) {
                $transposedDiagnostic[$i][] = $binaryCharacters[$i];
            }
        }

        $result = [];
        foreach ($transposedDiagnostic as $line) {
            $result[] = implode('', $line);
        }

        return $result;            
    }
}

