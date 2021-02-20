<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Page;

use App\Patterns\Structural\Bridge\Page\Abstraction\Product;
use App\Patterns\Structural\Bridge\Page\Abstraction\ProductPage;
use App\Patterns\Structural\Bridge\Page\Abstraction\SimplePage;
use App\Patterns\Structural\Bridge\Page\Implementation\HTMLRenderer;
use App\Patterns\Structural\Bridge\Page\Implementation\JsonRenderer;

class EntryPoint
{
    public function run(): void
    {
        /**
         * Клиентский код может выполняться с любой предварительно сконфигурированной
         * комбинацией Абстракция+Реализация.
         */
        $viewer = new Viewer();
        $HTMLRenderer = new HTMLRenderer();
        $JSONRenderer = new JsonRenderer();

        $page = new SimplePage($HTMLRenderer, "Home", "Welcome to our website!");
        $viewer->view($page);

        /**
         * При необходимости Абстракция может заменить связанную Реализацию во время
         * выполнения.
         */
        $page->changeRenderer($JSONRenderer);
        $viewer->view($page);
        //===========================================

        $product = new Product(
            "123",
            "Star Wars, episode1",
            "A long time ago in a galaxy far, far away...",
            "/images/star-wars.jpeg",
            39.95
        );

        $page = new ProductPage($HTMLRenderer, $product);
        $viewer->view($page);

        $page->changeRenderer($JSONRenderer);
        $viewer->view($page);
    }
}
