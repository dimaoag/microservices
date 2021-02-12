<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\SocialNetwork;

use App\Patterns\FactoryMethod\SocialNetwork\Facebook\FacebookPoster;
use App\Patterns\FactoryMethod\SocialNetwork\LinkedIn\LinkedInPoster;

class SocialNetworkFactory
{
    public static function createFacebookSocialNetwork(): SocialNetwork
    {
        return (new FacebookPoster("john_smith", "******"))->getSocialNetwork();
    }

    public static function createLinkedInSocialNetwork(): SocialNetwork
    {
        return (new LinkedInPoster("alex@example.com", "******"))->getSocialNetwork();
    }
}
