<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Interfaces;

interface ExportFieldsInterface
{
    /**
     * @param mixed|null $context
     * @return mixed
     */
    public function getExportFields1c($context = null);
}
