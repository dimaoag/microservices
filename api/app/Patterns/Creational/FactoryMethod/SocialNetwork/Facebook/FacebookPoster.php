<?php

declare(strict_types=1);

namespace App\Patterns\Creational\FactoryMethod\SocialNetwork\Facebook;

use App\Patterns\Creational\FactoryMethod\SocialNetwork\SocialNetwork;
use App\Patterns\Creational\FactoryMethod\SocialNetwork\SocialNetworkPoster;

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
