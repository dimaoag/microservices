<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Writer\Win;

use App\Patterns\Creational\AbstractFactory\Writer\CsvWriter;
use App\Patterns\Creational\AbstractFactory\Writer\JsonWriter;
use App\Patterns\Creational\AbstractFactory\Writer\WriterFactory;

class WinWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new WinCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new WinJsonWriter();
    }
}
