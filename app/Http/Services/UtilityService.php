<?php

namespace App\Http\Services;

class UtilityService
{
    public static function csvToArray($csvFile): array
    {
        $header = null;
        $data = array();
        if (($handle = fopen($csvFile, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}