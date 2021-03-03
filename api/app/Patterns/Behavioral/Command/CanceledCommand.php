<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\Command;

interface CanceledCommand extends Command
{
    /**
     * This method is used to undo change made by command execution
     */
    public function cancel(): void;
}
