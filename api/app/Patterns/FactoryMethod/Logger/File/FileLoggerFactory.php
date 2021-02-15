<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\Logger\File;

use App\Patterns\FactoryMethod\Logger\Logger;
use App\Patterns\FactoryMethod\Logger\LoggerFactory;

class FileLoggerFactory implements LoggerFactory
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogger(): Logger
    {
        return new FileLogger($this->filePath);
    }
}
