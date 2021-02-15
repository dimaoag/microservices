<?php

declare(strict_types=1);

namespace App\Patterns\Creational\FactoryMethod\Logger\StdOut;

use App\Patterns\Creational\FactoryMethod\Logger\Logger;

class StdOutLogger implements Logger
{
    public function log(string $message): void
    {
        echo $message;
    }
}
