<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Formatters;

use App\Patterns\Structural\Bridge\Formatters\Abstraction\HelloWorldService;
use App\Patterns\Structural\Bridge\Formatters\Implementation\HtmlFormatter;
use App\Patterns\Structural\Bridge\Formatters\Implementation\PlainTextFormatter;

class EntryPoint
{
    public function run(): void
    {
        $service = new HelloWorldService(new PlainTextFormatter());
        echo 'Hello World: ' . $service->get();

        $service->setImplementation(new HtmlFormatter());
        echo '<p>Hello World</p>' . $service->get();
    }
}
