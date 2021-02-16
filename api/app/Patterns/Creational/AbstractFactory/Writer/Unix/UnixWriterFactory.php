<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Writer\Unix;

use App\Patterns\Creational\AbstractFactory\Writer\CsvWriter;
use App\Patterns\Creational\AbstractFactory\Writer\JsonWriter;
use App\Patterns\Creational\AbstractFactory\Writer\WriterFactory;

class UnixWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new UnixCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new UnixJsonWriter();
    }
}
