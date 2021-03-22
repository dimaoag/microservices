<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\State\Transformer\State;

class MoveState implements State
{
    public function action(): void
    {
        echo 'move';
    }

}
