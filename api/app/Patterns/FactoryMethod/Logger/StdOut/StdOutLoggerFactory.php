<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\Logger\StdOut;

use App\Patterns\FactoryMethod\Logger\Logger;
use App\Patterns\FactoryMethod\Logger\LoggerFactory;

class StdOutLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}
