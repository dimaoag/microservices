<?php

declare(strict_types=1);

namespace App\Patterns\Creational\FactoryMethod\SocialNetwork2\Messenger;

use App\Patterns\Creational\FactoryMethod\SocialNetwork2\Message\MessageInterface;

interface MessengerInterface
{
    public function getUsername(): string;
    public function getPassword(): string;
    public function isConnected(): bool;
    public function createMessage(string $text, string $source, string $target): MessageInterface;
}
