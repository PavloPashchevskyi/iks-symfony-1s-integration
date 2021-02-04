<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Interfaces;

use Zenwalker\CommerceML\Model\Group;

interface GroupInterface extends IdentifierInterface
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
    public static function createTree1c($groups);
}
