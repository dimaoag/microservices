<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Proxy\BankAccount;

interface BankAccount
{
    public function deposit(int $amount): void;

    public function getBalance(): int;
}
