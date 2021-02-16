<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Writer;

use App\Patterns\Creational\AbstractFactory\Writer\Unix\UnixWriterFactory;
use App\Patterns\Creational\AbstractFactory\Writer\Win\WinWriterFactory;

class EntryPoint
{
    public function run1(): void
    {
        $factory = new UnixWriterFactory();
        $jsonWriter = $factory->createJsonWriter();
        $csvWriter = $factory->createCsvWriter();
        $jsonWriter->write(['one', 'two', 'three'], true);
        $csvWriter->write(['one', 'two', 'three']);
    }

    public function run2(): void
    {
        $factory = new WinWriterFactory();
        $jsonWriter = $factory->createJsonWriter();
        $csvWriter = $factory->createCsvWriter();
        $jsonWriter->write(['one', 'two', 'three'], true);
        $csvWriter->write(['one', 'two', 'three']);
    }
}
