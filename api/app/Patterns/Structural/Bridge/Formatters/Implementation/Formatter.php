<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Formatters\Implementation;

interface Formatter
{
    public function format(string $text): string;
}
