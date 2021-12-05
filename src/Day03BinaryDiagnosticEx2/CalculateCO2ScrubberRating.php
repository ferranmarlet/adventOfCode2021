<?php

declare(strict_types=1);

namespace AdventOfCode\Day03BinaryDiagnosticEx2;

class CalculateCO2ScrubberRating
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

        $leastCommonBitOnColumn = $this->getLeastCommonDigitOnRecordsColumn($records, $columnToExamine);
        $filteredRecords = $this->extractRecordsWhitLeastCommonBitOnColumn($records, $leastCommonBitOnColumn, $columnToExamine);
        return $this->applyBitCriteria($filteredRecords, $columnToExamine + 1);
    }

    public function getLeastCommonDigitOnRecordsColumn(array $records, int $column): int
    {
        $transposedRecords = RecordTransposer::transpose($records);
        // We use <= because to calculate C02 rating, 0 prevails for same number of 1s and 0s
        $result = substr_count($transposedRecords[$column], '0') <= count($records) / 2 ? 0 : 1;
        return $result;
    }

    public function extractRecordsWhitLeastCommonBitOnColumn(array $records, int $leastCommonBit, $column): array
    {
        $filteredRecords = [];
        foreach ($records as $record) {
            if (substr($record, $column, 1) == (string)$leastCommonBit) {
                $filteredRecords[] = $record;
            }
        }

        return $filteredRecords;
    }
}
