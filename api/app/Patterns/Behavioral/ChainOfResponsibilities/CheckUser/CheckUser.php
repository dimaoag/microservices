<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\ChainOfResponsibilities\CheckUser;

abstract class CheckUser
{
    private ?CheckUser $nextCheck = null;

    public function then(CheckUser $checkUser): void
    {
        $this->nextCheck = $checkUser;
    }

    abstract public function check(User $user): void;

    public function next(User $user): void
    {
        $this->nextCheck?->check($user);
    }
}
