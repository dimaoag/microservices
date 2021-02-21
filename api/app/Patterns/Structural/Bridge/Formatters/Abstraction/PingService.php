<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Formatters\Abstraction;

class PingService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('pong');
    }
}
