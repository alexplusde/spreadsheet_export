<?php

class spreadsheet_export
{
    public static function sendTable($table, $filename = null) {
        
        if(!rex_sql_table::get($table)->exists()) {
            exit;
        }

        $data = rex_sql::factory()->getArray('SELECT * FROM '. $table);
        if(count($data)) {
            array_unshift($data, array_keys($data[0]));
        }

        $writer = new XLSXWriter();
        $writer->writeSheet($data);

        rex_response::sendResource($writer->writeToString(), "application/vnd.ms-excel", time(),  null, 'attachment', $filename ?? $table.".xlsx");
        exit;
    }

    public static function sendArray($array, $filename = null) {
        
        $writer = new XLSXWriter();
        $writer->writeSheet($array);

        rex_response::sendResource($writer->writeToString(), "application/vnd.ms-excel", time(),  null, 'attachment', $filename ?? $table.".xlsx");
        exit;
    }

    public static function writeTable($table, $path = null, $filename = null) : ?rex_file {

        if(!rex_sql_table::get($table)->exists()) {
            return null;
        }

        if(!$path) {
            $path = rex_path::addonData('spreadsheet_export', $filename ?? $table.'.xlsx');
        }
        
        $data = rex_sql::factory()->getArray('SELECT * FROM '. $table);
        if(count($data)) {
            array_unshift($data, array_keys($data[0]));
        }

        rex_file::put($path, "");
          
        $writer = new XLSXWriter();
        $writer->writeSheet($data);
        $writer->writeToFile($path);
        return rex_file::get($path);
    }

    public static function writeArray($array, $path = null, $filename = null) : ?rex_file {

        if(!$path) {
            $path = rex_path::addonData('spreadsheet_export', $filename ?? $table.'.xlsx');
        }
        
        rex_file::put($path, "");
          
        $writer = new XLSXWriter();
        $writer->writeSheet($array);
        $writer->writeToFile($path);
        return rex_file::get($path);
    }
}
