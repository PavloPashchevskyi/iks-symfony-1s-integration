<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Interfaces;

interface IdentifierInterface
{
    /**
     * Возвращаем имя поля в базе данных, в котором хранится ID из 1с
     *
     * @return string
     */
    public static function getIdFieldName1c();

    /**
     * Возвращаем id сущности.
     *
     * @return int|string
     */
    public function getPrimaryKey();
}
