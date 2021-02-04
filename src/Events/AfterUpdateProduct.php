<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Events;

use Iks\Symfony1SIntegration\Interfaces\ProductInterface;

class AfterUpdateProduct extends AbstractEventInterface
{
    const NAME = 'after.update.product';

    /**
     * @var ProductInterface
     */
    public $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }
}
