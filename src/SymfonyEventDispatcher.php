<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration;

use Iks\Symfony1SIntegration\Interfaces\EventDispatcherInterface as EventDispatcher;
use Iks\Symfony1SIntegration\Interfaces\EventInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SymfonyEventDispatcher implements EventDispatcher
{
    /** @var EventDispatcherInterface */
    protected $eventDispatcher;

    /**
     * SymfonyEventDispatcher constructor.
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param EventInterface $event
     */
    public function dispatch(EventInterface $event): void
    {
        $listeners = $this->eventDispatcher->getListeners($event->getName());

        foreach ($listeners as $listener) {
            call_user_func($listener, $event);
        }
    }
}
