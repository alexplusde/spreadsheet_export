# Spreadsheet Export - REDAXO 5 Addon für PHP_XLSXWriter

Stellt Tabellen als XLSX-Export zur Verfügung.

```php
// Sendet export.xlsx direkt als Datei-Download
spreadsheet_export::sendTable('rex_example', "export");

// Inhalt in eine Datei schreiben, gibt ein rex_file-Objekt zurück
spreadsheet_export::writeTable('rex_example'); // Gibt ein rex_file-Objekt zurück

// Sendet export.xlsx direkt als Dateidownload anhand einse Arrays, z.B. von rex_sql
$array = rex_sql::factory()->getArray("SELECT * FROM rex_example");
spreadsheet_export::sendArray($array, "export");

// Inhalt in eine Datei schreiben, gibt ein rex_file-Objekt zurück
$array = rex_sql::factory()->getArray("SELECT * FROM rex_example");
spreadsheet_export::writeArray($array);
```

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/spreadsheet_export/blob/master/LICENSE.md)  

## Autoren

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits

<https://github.com/mk-j/PHP_XLSXWriter/>
