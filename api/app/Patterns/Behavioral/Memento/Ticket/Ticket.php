<?php

declare(strict_types=1);

namespace App\Patterns\Behavioral\Memento\Ticket;

/**
 * Ticket is the "Originator" in this implementation
 */
class Ticket
{
    private State $currentState;

    public function __construct()
    {
        $this->currentState = new State(State::STATE_CREATED);
    }

    public function open(): void
    {
        $this->currentState = new State(State::STATE_OPENED);
    }

    public function assign(): void
    {
        $this->currentState = new State(State::STATE_ASSIGNED);
    }

    public function close(): void
    {
        $this->currentState = new State(State::STATE_CLOSED);
    }

    public function saveToMemento(): Memento
    {
        return new Memento(clone $this->currentState);
    }

    public function restoreFromMemento(Memento $memento): void
    {
        $this->currentState = $memento->getState();
    }

    public function getState(): State
    {
        return $this->currentState;
    }
}
