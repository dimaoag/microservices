<?php

declare(strict_types=1);

namespace App\Patterns\Creational\SimpleFactory;

class EntryPoint
{
    public function run(): void
    {
        $factory = new SimpleFactory();
        $bicycle = $factory->createBicycle();
        $bicycle->driveTo('Paris');
    }
}
