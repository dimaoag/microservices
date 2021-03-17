<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\Observer\Vacancies;

interface Observer
{
    public function handle(array $vacancies): void;
}
