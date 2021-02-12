<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\SocialNetwork2;

use App\Patterns\FactoryMethod\SocialNetwork2\Messenger\TwitterMessenger;

class EntryPoint
{
    public function run(): void
    {
        $twitter = new TwitterMessenger('username_twitter', 'password');
        $twit = $twitter->createMessage('Some text to Twitter', 'sender', 'recipient');
        $twit->send();
    }
}
