<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\ChainOfResponsibilities\CheckUser;

class EntryPoint
{
    public function run(): void
    {
        $checker = new CheckId();
        $checker
            ->then(new CheckName())
            ->then(new CheckEmail());


        $checker->check(new User());
    }
}
