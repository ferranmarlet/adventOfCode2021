<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx2;

class RecordTransposer
{
    public static function transpose(array $records): array
    {
        $transposedRecords = [];

        foreach ($records as $binaryEntry) {
            $binaryCharacters = str_split($binaryEntry);

            for ($i = 0; $i < count($binaryCharacters); $i++) {
                $transposedRecords[$i][] = $binaryCharacters[$i];
            }
        }

        $result = [];
        foreach ($transposedRecords as $line) {
            $result[] = implode('', $line);
        }

        return $result;            
    }
}

