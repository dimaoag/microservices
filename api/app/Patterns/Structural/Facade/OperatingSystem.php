<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Facade;

class OperatingSystem
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function halt(): void
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
