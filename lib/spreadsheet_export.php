<?php

class spreadsheet_export
{
    public static function sendTable($table) {
        
        $data = rex_sql::factory()->getArray('SELECT * FROM '. $table);
        if(count($data)) {
            array_unshift($data, array_keys($data[0]));
        }

        rex_file::put(rex_path::addonCache('spreadsheet_export', 'output.xlsx'), "");
          
        $writer = new XLSXWriter();
        $writer->writeSheet($data);

        rex_response::sendResource($writer->writeToString(), "application/vnd.ms-excel", time(),  null, 'attachment', "output.xlsx");
        exit;
    }

    public static function writeTable($table, $path) {
        
        $data = rex_sql::factory()->getArray('SELECT * FROM '. $table);
        if(count($data)) {
            array_unshift($data, array_keys($data[0]));
        }

        rex_file::put($path);
          
        $writer = new XLSXWriter();
        $writer->writeSheet($data);
        $writer->writeToFile($path);
        return;
    }
}
