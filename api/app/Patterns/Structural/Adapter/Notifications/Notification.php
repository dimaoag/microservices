<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Adapter\Notifications;

interface Notification
{
    public function send(string $title, string $message): void;
}
