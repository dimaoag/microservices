<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Cars\Truck;

use App\Patterns\Creational\AbstractFactory\Cars\Car\BodyInterface;
use App\Patterns\Creational\AbstractFactory\Cars\Car\CarFactoryInterface;
use App\Patterns\Creational\AbstractFactory\Cars\Car\EngineInterface;
use App\Patterns\Creational\AbstractFactory\Cars\Car\TankInterface;

class TruckFactory implements CarFactoryInterface
{
    public function createBody(): BodyInterface
    {
        return new Body();
    }

    public function createEngine(): EngineInterface
    {
        return new Engine();
    }

    public function createTank(): TankInterface
    {
        return new Tank();
    }
}
