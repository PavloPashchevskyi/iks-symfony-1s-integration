<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Events;

use Iks\Symfony1SIntegration\Interfaces\ProductInterface;

class BeforeUpdateProduct extends AbstractEventInterface
{
    const NAME = 'before.update.product';

    /**
     * @var ProductInterface
     */
    public $product;

    /**
     * BeforeUpdateProduct constructor.
     *
     * @param ProductInterface $product
     */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }
}
