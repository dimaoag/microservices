<?php

declare(strict_types=1);

namespace App\Patterns\Structural\Bridge\Page;

use App\Patterns\Structural\Bridge\Page\Abstraction\Page;

/**
 * Клиентский код имеет дело только с объектами Абстракции.
 */
class Viewer
{
    public function view(Page $page): void
    {
        echo $page->view();
    }
}
