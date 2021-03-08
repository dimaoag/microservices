<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\Mediator\Robot;

interface Mediator
{
    public function notify(Emitter $emitter, string $event): void;
}
