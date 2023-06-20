<?php


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper\Downloader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class spreadsheet_export
{
    public static function sql() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $array = rex_sql::factory()->getArray("SELECT id, name FROM rex_article");


        $header = array("id", "name");
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray([$header], $array, 'A1');

        // Dateinamen für die Excel-Datei generieren
        $filename = 'export.xlsx';

        // Excel-Datei speichern
        $writer = new Xlsx($spreadsheet);
        dd($writer);
    }
}
