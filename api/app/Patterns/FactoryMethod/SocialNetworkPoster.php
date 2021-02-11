<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

abstract class SocialNetworkPoster
{
    // factory method
    abstract public function getSocialNetwork(): SocialNetwork;

    public function post(string $content): void
    {
        $network = $this->getSocialNetwork();
        $network->logIn();
        $network->createPost($content);
        $network->logout();
    }
}
