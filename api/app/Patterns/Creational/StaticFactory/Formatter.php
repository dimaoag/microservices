<?php

declare(strict_types=1);

namespace App\Patterns\Creational\StaticFactory;

interface Formatter
{
    public function format(string $input): string;
}
