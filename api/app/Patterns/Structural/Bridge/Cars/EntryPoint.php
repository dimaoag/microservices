<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Cars;

use App\Patterns\Structural\Bridge\Cars\Abstraction\Audi;
use App\Patterns\Structural\Bridge\Cars\Abstraction\Bmw;
use App\Patterns\Structural\Bridge\Cars\Implementation\Black;
use App\Patterns\Structural\Bridge\Cars\Implementation\Red;

class EntryPoint
{
    public function run(): void
    {
        $bmw = new Bmw(new Black());
        echo 'This is black bmw: ' . $bmw->getColor();

        $bmw->paint(new Red());
        echo 'This is red bmw: ' . $bmw->getColor();


        $audi = new Audi(new Black());
        echo 'This is black audi: ' . $audi->getColor();

        $audi->paint(new Red());
        echo 'This is red audi: ' . $audi->getColor();
    }
}
