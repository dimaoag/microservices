<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Cars\Implementation;

class Black implements Color
{
    public function getValue(): string
    {
        return 'black';
    }
}
