<?php

declare(strict_types=1);

namespace App\Patterns\FactoryMethod\Logger;

use App\Patterns\FactoryMethod\Logger\File\FileLoggerFactory;
use App\Patterns\FactoryMethod\Logger\StdOut\StdOutLoggerFactory;

class EntryPoint
{
    public function run(): void
    {
        $stdOutLogger = (new StdoutLoggerFactory())->createLogger();
        $stdOutLogger->log('Log some message 1');

        $fileLogger = (new FileLoggerFactory(sys_get_temp_dir()))->createLogger();
        $fileLogger->log('Log some message 2');
    }
}
