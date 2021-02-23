<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Composite\Car;

class Body extends Composite
{
    public function __construct()
    {
        parent::__construct('Body');
    }
}
