<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Writer\Win;

use App\Patterns\Creational\AbstractFactory\Writer\CsvWriter;

class WinCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return implode(',', $line) . "\r\n";
    }
}
