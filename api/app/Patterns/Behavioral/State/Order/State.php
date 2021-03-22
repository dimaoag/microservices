<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\State\Order;

interface State
{
    public function proceedToNext(OrderContext $context): void;

    public function toString(): string;
}
