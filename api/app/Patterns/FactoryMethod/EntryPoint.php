<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

use App\Patterns\FactoryMethod\Facebook\FacebookPoster;
use App\Patterns\FactoryMethod\LinkedIn\LinkedInPoster;

class EntryPoint
{
    public function createPostForFacebook(): void
    {
        $service = new Service(new FacebookPoster("john_smith", "******"));
        $service->createPost('First post on Facebook!');
    }

    public function createPostForLinkedIn(): void
    {
        $service = new Service(new LinkedInPoster("alex@example.com", "******"));
        $service->createPost('First post on LinkedIn!');
    }
}
