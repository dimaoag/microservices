<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\Observer\Vacancies;

interface Observed
{
    public function notifyObservers(): void;
}
