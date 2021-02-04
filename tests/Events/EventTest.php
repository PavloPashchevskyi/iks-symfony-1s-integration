<?php
declare(strict_types=1);

namespace Tests\Events;

use Iks\Symfony1SIntegration\Events\BeforeOffersSync;
use Tests\TestCase;

class EventTest extends TestCase
{
    public function testGetName()
    {
        $event = new  BeforeOffersSync();
        $this->assertTrue(is_string($event->getName()));
    }
}
