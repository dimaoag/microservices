<?php

declare(strict_types=1);

namespace App\Patterns\Creational\AbstractFactory\Cars;

use App\Patterns\Creational\AbstractFactory\Cars\Car\Car;
use App\Patterns\Creational\AbstractFactory\Cars\Sedan\SedanFactory;
use App\Patterns\Creational\AbstractFactory\Cars\Truck\TruckFactory;

class EntryPoint
{
    public function run(): void
    {
        $sedan = new Car(new SedanFactory());
        $sedan->run();

        $truck = new Car(new TruckFactory());
        $truck->run();
    }
}
