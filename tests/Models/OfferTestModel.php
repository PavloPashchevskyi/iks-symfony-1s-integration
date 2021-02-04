<?php
declare(strict_types=1);

namespace Tests\Models;

use Iks\Symfony1SIntegration\Interfaces\OfferInterface;
use Iks\Symfony1SIntegration\Interfaces\GroupInterface;
use Zenwalker\CommerceML\Model\Price;
use Zenwalker\CommerceML\Model\Simple;

class OfferTestModel implements OfferInterface
{
    /**
     * @param mixed|null $context
     *
     * @return array
     */
    public function getExportFields1c($context = null)
    {
        // TODO: Implement getExportFields1c() method.
    }

    /**
     * Возвращаем имя поля в базе данных, в котором хранится ID из 1с
     *
     * @return string
     */
    public static function getIdFieldName1c()
    {
        // TODO: Implement getIdFieldName1c() method.
    }

    /**
     * Возвращаем id сущности.
     *
     * @return int|string
     */
    public function getPrimaryKey()
    {
        // TODO: Implement getPrimaryKey() method.
    }

    /**
     * @return GroupInterface
     */
    public function getGroup1c()
    {
        // TODO: Implement getGroup1c() method.
    }

    /**
     * offers.xml > ПакетПредложений > Предложения > Предложение > Цены.
     *
     * Цена товара,
     * К $price можно обратиться как к массиву, чтобы получить список цен (Цены > Цена)
     * $price->type - тип цены (offers.xml > ПакетПредложений > ТипыЦен > ТипЦены)
     *
     * @param Price $price
     *
     * @return void
     */
    public function setPrice1c($price)
    {
        // TODO: Implement setPrice1c() method.
    }

    /**
     * @param $types
     *
     * @return void
     */
    public static function createPriceTypes1c($types)
    {
        // TODO: Implement createPriceTypes1c() method.
    }

    /**
     * offers.xml > ПакетПредложений > Предложения > Предложение > ХарактеристикиТовара > ХарактеристикаТовара.
     *
     * Характеристики товара
     * $name - Наименование
     * $value - Значение
     *
     * @param Simple $specification
     *
     * @return void
     */
    public function setSpecification1c($specification)
    {
        // TODO: Implement setSpecification1c() method.
    }
}
