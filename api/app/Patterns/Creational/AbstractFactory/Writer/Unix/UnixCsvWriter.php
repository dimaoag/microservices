<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Writer\Unix;

use App\Patterns\Creational\AbstractFactory\Writer\CsvWriter;

class UnixCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return implode(',', $line) . "\n";
    }
}
