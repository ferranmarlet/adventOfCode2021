<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx2;

class CalculateOxygenGeneratorRating
{
    public function execute(array $records): string
    {
        $filteredRecords = $this->applyBitCriteria($records, 0);
        return $filteredRecords[0];

    }

    private function applyBitCriteria(array $records, int $columnToExamine): array
    {
        if (count($records) === 1 || $columnToExamine >= strlen($records[0])) {
            return $records;
        } 

        $mostCommonBitOnColumn = $this->getMostCommonDigitOnRecordsColumn($records, $columnToExamine);
        $filteredRecords = $this->extractRecordsWhitMostCommonBitOnColumn($records, $mostCommonBitOnColumn, $columnToExamine);
        return $this->applyBitCriteria($filteredRecords, $columnToExamine + 1);
    }

    public function getMostCommonDigitOnRecordsColumn(array $records, int $column): int
    {
        $transposedRecords = RecordTransposer::transpose($records);
        // We use >= because to calculate oxygen rating, 1 prevails for same number of 1s and 0s
        $result = substr_count($transposedRecords[$column], '1') >= count($records) / 2 ? 1 : 0;
        return $result;
    }

    public function extractRecordsWhitMostCommonBitOnColumn(array $records, int $mostCommonBit, $column): array
    {
        $filteredRecords = [];
        foreach ($records as $record) {
            if (substr($record, $column, 1) == (string)$mostCommonBit) {
                $filteredRecords[] = $record;
            }
        }

        return $filteredRecords;
    }
}
