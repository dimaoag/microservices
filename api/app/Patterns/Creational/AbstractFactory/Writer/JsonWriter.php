<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Writer;

interface JsonWriter
{
    public function write(array $data, bool $formatted): string;
}
