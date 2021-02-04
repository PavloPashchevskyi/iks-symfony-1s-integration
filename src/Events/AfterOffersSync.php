<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Events;

class AfterOffersSync extends AbstractEventInterface
{
    const NAME = 'after.offers.sync';

    /**
     * @var array
     */
    public $ids;

    /**
     * AfterOffersSync constructor.
     * @param array $ids
     */
    public function __construct(array $ids = [])
    {
        $this->ids = $ids;
    }
}
