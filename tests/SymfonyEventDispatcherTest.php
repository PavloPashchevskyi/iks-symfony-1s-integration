<?php
declare(strict_types=1);

namespace Tests;

use Iks\Symfony1SIntegration\Interfaces\EventInterface;
use Iks\Symfony1SIntegration\SymfonyEventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcher;

class SymfonyEventDispatcherTest extends TestCase
{
    public function testDispatch()
    {
        $symfonyDispatcher = new EventDispatcher();
        $symfonyDispatcher->addListener('test event', function () {
        });
        $bridgeDispatcher = new SymfonyEventDispatcher($symfonyDispatcher);
        $event = $this->createMock(EventInterface::class);
        $event->method('getName')
            ->willReturn('test event');

        $this->assertNull($bridgeDispatcher->dispatch($event));
    }
}
