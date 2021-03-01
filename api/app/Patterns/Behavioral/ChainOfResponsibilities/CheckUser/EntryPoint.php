<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\ChainOfResponsibilities\CheckUser;

class EntryPoint
{
    public function run(): void
    {
        $checkId = new CheckId();
        $checkName = new CheckName();
        $checkEmail = new CheckEmail();

        $checkId->then($checkName);
        $checkName->then($checkEmail);

        $checkId->check(new User());
    }
}
