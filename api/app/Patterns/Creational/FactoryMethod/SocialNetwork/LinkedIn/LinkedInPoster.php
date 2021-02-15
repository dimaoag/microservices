<?php

declare(strict_types=1);

namespace App\Patterns\Creational\FactoryMethod\SocialNetwork\LinkedIn;

use App\Patterns\Creational\FactoryMethod\SocialNetwork\SocialNetwork;
use App\Patterns\Creational\FactoryMethod\SocialNetwork\SocialNetworkPoster;

class LinkedInPoster extends SocialNetworkPoster
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetwork
    {
        return new LinkedIn($this->email, $this->password);
    }
}
