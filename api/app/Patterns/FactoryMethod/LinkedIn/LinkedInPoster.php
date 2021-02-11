<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\LinkedIn;

use App\Patterns\FactoryMethod\SocialNetwork;
use App\Patterns\FactoryMethod\SocialNetworkPoster;

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
