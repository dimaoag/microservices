<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\Mediator\EventDispatcher;
/**
 * Простая вспомогательная функция для предоставления глобального доступа к
 * диспетчеру событий.
 */
return static function (): EventDispatcher {
    static $eventDispatcher;

    if (!$eventDispatcher) {
        $eventDispatcher = new EventDispatcher();
    }

    return $eventDispatcher;
};
