<?php

declare(strict_types=1);

namespace App\Patterns\Creational\FactoryMethod\Logger;

interface LoggerFactory
{
    public function createLogger(): Logger;
}
