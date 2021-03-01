<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\ChainOfResponsibilities\Account;

abstract class Account
{
    public int $balance;
    public ?Account $account = null;

    public function __construct(int $balance, ?Account $account = null)
    {
        $this->balance = $balance;
        $this->account = $account;
    }

    public function pay(int $orderPrice): bool
    {
        if ($this->canPay($orderPrice)) {
            return true;
        }

        if ($this->account) {
            return $this->account->pay($orderPrice);
        }

        return false;
    }

    public function canPay(int $amount): bool
    {
        return $this->balance >= $amount;
    }
}
