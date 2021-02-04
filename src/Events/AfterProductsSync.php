<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Events;

class AfterProductsSync extends AbstractEventInterface
{
    const NAME = 'after.products.sync';

    /**
     * @var array
     */
    public $ids;

    /**
     * AfterProductsSync constructor.
     * @param array $ids
     */
    public function __construct(array $ids = [])
    {
        $this->ids = $ids;
    }
}
