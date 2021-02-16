<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Writer\Unix;

use App\Patterns\Creational\AbstractFactory\Writer\JsonWriter;

class UnixJsonWriter implements JsonWriter
{
    public function write(array $data, bool $formatted): string
    {
        $options = 0;

        if ($formatted) {
            $options = JSON_PRETTY_PRINT;
        }

        return json_encode($data, JSON_THROW_ON_ERROR | $options);
    }
}
