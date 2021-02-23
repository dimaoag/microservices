<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Composite\Car;

class Exterior extends Equipment
{
    public function __construct()
    {
        parent::__construct('Exterior', 745.34);
    }
}
