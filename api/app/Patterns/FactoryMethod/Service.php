<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

class Service
{
    private SocialNetworkPoster $creator;

    public function __construct(SocialNetworkPoster $creator)
    {
        $this->creator = $creator;
    }

    public function createPost(string $content): void
    {
        $this->creator->post($content);
    }
}
