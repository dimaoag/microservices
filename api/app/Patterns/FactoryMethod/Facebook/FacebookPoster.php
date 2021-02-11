<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\Facebook;

use App\Patterns\FactoryMethod\SocialNetwork;
use App\Patterns\FactoryMethod\SocialNetworkPoster;

class FacebookPoster extends SocialNetworkPoster
{
    private string $login;
    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getSocialNetwork(): SocialNetwork
    {
        return new Facebook($this->login, $this->password);
    }
}
