<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Events;

use Iks\Symfony1SIntegration\Interfaces\OfferInterface;
use Zenwalker\CommerceML\Model\Offer;

class BeforeUpdateOffer extends AbstractEventInterface
{
    const NAME = 'before.update.offer';

    /**
     * @var OfferInterface
     */
    public $model;

    /**
     * @var Offer
     */
    public $offer;

    /**
     * BeforeUpdateOffer constructor.
     *
     * @param OfferInterface $model
     * @param Offer          $offer
     */
    public function __construct(OfferInterface $model, Offer $offer)
    {
        $this->model = $model;
        $this->offer = $offer;
    }
}
