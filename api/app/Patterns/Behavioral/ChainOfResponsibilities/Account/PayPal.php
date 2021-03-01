<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\ChainOfResponsibilities\Account;

class PayPal extends Account
{
    public string $name;

    public function __construct(int $balance, Account $account)
    {
        parent::__construct($balance, $account);
        $this->name = 'PayPal';
    }
}
