<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\Command\Car;

interface Command
{
    public function execute(): void;
}
