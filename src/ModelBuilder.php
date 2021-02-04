<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration;

use Iks\Symfony1SIntegration\Interfaces\ModelBuilderInterface;
use Iks\Symfony1SIntegration\Exceptions\Exchange1CException;

class ModelBuilder implements ModelBuilderInterface
{
    /**
     * Если модель в конфиге не установлена, то импорт не будет произведен.
     *
     * @param Config $config
     * @param string $interface
     *
     * @throws Exchange1CException
     *
     * @return null|mixed
     */
    public function getInterfaceClass(Config $config, string $interface)
    {
        $model = $config->getModelClass($interface);
        if ($model) {
            $modelInstance = new $model();
            if ($modelInstance instanceof $interface) {
                return $modelInstance;
            }
        }

        throw new Exchange1CException(sprintf('Model %s not instantiable interface %s', $config->getModelClass($interface), $interface));
    }
}