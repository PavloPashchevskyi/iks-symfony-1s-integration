<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Interfaces;

/**
 * Interface EventDispatcherInterface
 * @package Iks\Symfony1SIntegration\Interfaces
 */
interface EventDispatcherInterface
{
    /**
     * @param EventInterface $event
     */
    public function dispatch(EventInterface $event): void;
}
