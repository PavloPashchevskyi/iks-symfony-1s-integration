<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration;

use Iks\Symfony1SIntegration\Interfaces\EventDispatcherInterface;
use Iks\Symfony1SIntegration\Interfaces\EventInterface;

class SymfonyEventDispatcher implements EventDispatcherInterface
{
    public function dispatch(EventInterface $event): void
    {
        // TODO: Implement dispatch() method.
    }
}
