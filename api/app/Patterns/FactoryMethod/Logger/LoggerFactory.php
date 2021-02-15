<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\Logger;

interface LoggerFactory
{
    public function createLogger(): Logger;
}
