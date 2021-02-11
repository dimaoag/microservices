<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

interface SocialNetwork
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost(string $content): void;
}
