<?php

declare(strict_types=1);

namespace App\Patterns\Creational\FactoryMethod\Logger\StdOut;

use App\Patterns\Creational\FactoryMethod\Logger\Logger;
use App\Patterns\Creational\FactoryMethod\Logger\LoggerFactory;

class StdOutLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}
