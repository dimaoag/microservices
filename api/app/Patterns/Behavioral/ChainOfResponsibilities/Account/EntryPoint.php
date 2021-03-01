<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\ChainOfResponsibilities\Account;

class EntryPoint
{
    public function run(): void
    {
        $paySystem = new MasterCard(
            100,
            new PayPal(
                200,
                new Visa(500)
            )
        );

        if ($paySystem->pay(438)) {
            echo 'Good';
        }
    }
}
