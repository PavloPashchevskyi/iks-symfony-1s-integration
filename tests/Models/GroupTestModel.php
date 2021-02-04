<?php
declare(strict_types=1);

namespace Tests\Models;

use Iks\Symfony1SIntegration\Interfaces\GroupInterface;
use Zenwalker\CommerceML\Model\Group;

class GroupTestModel implements GroupInterface
{
    /**
     * Создание дерева групп
     * в параметр передаётся массив всех групп (import.xml > Классификатор > Группы)
     * $groups[0]->parent - родительская группа
     * $groups[0]->children - дочерние группы.
     *
     * @param Group[] $groups
     *
     * @return void
     */
    public static function createTree1c($groups)
    {
        // TODO: Implement createTree1c() method.
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
}
