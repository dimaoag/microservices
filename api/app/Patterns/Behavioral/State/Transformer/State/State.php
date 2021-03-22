<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\State\Transformer\State;

interface State
{
    public function action(): void;
}
