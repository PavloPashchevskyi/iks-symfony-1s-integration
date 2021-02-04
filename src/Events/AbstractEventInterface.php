<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Events;

use Iks\Symfony1SIntegration\Interfaces\EventInterface;

/**
 * Class AbstractEventInterface
 * @package Iks\Symfony1SIntegration\Events
 */
abstract class AbstractEventInterface implements EventInterface
{
    public const NAME = self::class;

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::NAME;
    }
}
