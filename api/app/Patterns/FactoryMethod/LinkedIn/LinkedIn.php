<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\LinkedIn;

use App\Patterns\FactoryMethod\SocialNetwork;

class LinkedIn implements SocialNetwork
{
    private string $email;
    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->email = $login;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Send HTTP API request to log in user $this->email with " .
            "password $this->password\n";
    }

    public function logOut(): void
    {
        echo "Send HTTP API request to log out user $this->email\n";
    }

    public function createPost(string $content): void
    {
        echo "Send HTTP API requests to create a post in LinkedIn timeline.\n";
    }
}
