<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\Logger\StdOut;

use App\Patterns\FactoryMethod\Logger\Logger;

class StdOutLogger implements Logger
{
    public function log(string $message): void
    {
        echo $message;
    }
}
