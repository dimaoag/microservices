<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Cars\Truck;

use App\Patterns\Creational\AbstractFactory\Cars\Car\BodyInterface;

class Body implements BodyInterface
{

    public function aerodynamic(): float
    {
        return 2.345;
    }

    public function maxWeight(): float
    {
        return 10.33;
    }
}
