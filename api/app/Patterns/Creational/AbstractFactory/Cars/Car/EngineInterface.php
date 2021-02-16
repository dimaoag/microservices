<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Cars\Car;

interface EngineInterface
{
    public function maxSpeed(): float;
    public function getConsumption(float $speed): float;
}
