<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Decorator\Booking;

class DoubleRoomBooking implements Booking
{
    public function calculatePrice(): int
    {
        return 40;
    }

    public function getDescription(): string
    {
        return 'double room';
    }
}
