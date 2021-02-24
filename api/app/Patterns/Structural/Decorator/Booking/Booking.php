<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Decorator\Booking;

interface Booking
{
    public function calculatePrice(): int;

    public function getDescription(): string;
}
