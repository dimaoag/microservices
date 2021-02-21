<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Cars\Abstraction;

use App\Patterns\Structural\Bridge\Cars\Implementation\Color;

abstract class Car
{
    protected Color $color;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function paint(Color $color): void
    {
        $this->color = $color;
    }

    abstract public function getColor(): string;
}
