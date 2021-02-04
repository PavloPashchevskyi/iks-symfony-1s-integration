<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Interfaces;

use Iks\Symfony1SIntegration\Config;

/**
 * Interface ModelBuilderInterface
 * @package Iks\Symfony1SIntegration\Interfaces
 */
interface ModelBuilderInterface
{
    /**
     * Если модель в конфиге не установлена, то импорт не будет произведен.
     *
     * @param Config $config
     * @param string $interface
     *
     * @return null|mixed
     */
    public function getInterfaceClass(Config $config, string $interface);
}
