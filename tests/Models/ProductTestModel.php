<?php
declare(strict_types=1);

namespace Tests\Models;

use Iks\Symfony1SIntegration\Interfaces\GroupInterface;
use Iks\Symfony1SIntegration\Interfaces\OfferInterface;
use Iks\Symfony1SIntegration\Interfaces\ProductInterface;
use Zenwalker\CommerceML\CommerceML;
use Zenwalker\CommerceML\Model\Product;
use Zenwalker\CommerceML\Model\Group;
use Zenwalker\CommerceML\Model\Property;
use Zenwalker\CommerceML\Collections\PropertyCollection;
use Zenwalker\CommerceML\Model\Offer;

class ProductTestModel implements ProductInterface
{
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
     * Получение уникального идентификатора продукта в рамках БД сайта.
     *
     * @return int|string
     */
    public function getPrimaryKey()
    {
        // TODO: Implement getPrimaryKey() method.
    }

    /**
     * Если по каким то причинам файлы import.xml или offers.xml были модифицированы и какие то данные
     * не попадают в парсер, в самом конце вызывается данный метод, в $product и $cml можно получить все
     * возможные данные для ручного парсинга.
     *
     * @param CommerceML    $cml
     * @param Product $product
     *
     * @return void
     */
    public function setRaw1cData($cml, $product)
    {
        // TODO: Implement setRaw1cData() method.
    }

    /**
     * Установка реквизитов, (import.xml > Каталог > Товары > Товар > ЗначенияРеквизитов > ЗначениеРеквизита)
     * $name - Наименование
     * $value - Значение.
     *
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function setRequisite1c($name, $value)
    {
        // TODO: Implement setRequisite1c() method.
    }

    /**
     * Предпологается, что дерево групп у Вас уже создано (\carono\exchange1c\interfaces\GroupInterface::createTree1c).
     *
     * @param Group $group
     *
     * @return mixed
     */
    public function setGroup1c($group)
    {
        // TODO: Implement setGroup1c() method.
    }

    /**
     * import.xml > Классификатор > Свойства > Свойство
     * $property - Свойство товара.
     *
     * import.xml > Классификатор > Свойства > Свойство > Значение
     * $property->value - Разыменованное значение (string)
     *
     * import.xml > Классификатор > Свойства > Свойство > ВариантыЗначений > Справочник
     * $property->getValueModel() - Данные по значению, Ид значения, и т.д
     *
     * @param Property $property
     *
     * @return void
     */
    public function setProperty1c($property)
    {
        // TODO: Implement setProperty1c() method.
    }

    /**
     * @param string $path
     * @param string $caption
     *
     * @return void
     */
    public function addImage1c($path, $caption)
    {
        // TODO: Implement addImage1c() method.
    }

    /**
     * @return GroupInterface
     */
    public function getGroup1c()
    {
        // TODO: Implement getGroup1c() method.
    }

    /**
     * Создание всех свойств продутка
     * import.xml > Классификатор > Свойства.
     *
     * $properties[]->availableValues - список доступных значений, для этого свойства
     * import.xml > Классификатор > Свойства > Свойство > ВариантыЗначений > Справочник
     *
     * @param PropertyCollection $properties
     *
     * @return mixed
     */
    public static function createProperties1c($properties)
    {
        // TODO: Implement createProperties1c() method.
    }

    /**
     * @param Offer $offer
     *
     * @return OfferInterface
     */
    public function getOffer1c($offer)
    {
        return new OfferTestModel();
    }

    /**
     * @param Product $product
     *
     * @return self
     */
    public static function createModel1c($product)
    {
        return new self();
    }

    /**
     * @param string $id
     *
     * @return ProductInterface|null
     */
    public static function findProductBy1c(string $id): ?ProductInterface
    {
        return new self();
    }
}
