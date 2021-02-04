<?php
declare(strict_types=1);

namespace Tests;

use Iks\Symfony1SIntegration\Config;
use Iks\Symfony1SIntegration\Exceptions\Exchange1CException;
use Iks\Symfony1SIntegration\Interfaces\GroupInterface;
use Iks\Symfony1SIntegration\ModelBuilder;
use Tests\Models\GroupTestModel;
use Tests\Models\ProductTestModel;

class ModelBuilderTest extends TestCase
{
    public function testGetInterfaceClass(): void
    {
        $values = [
            'models'    => [
                GroupInterface::class => GroupTestModel::class,
            ],
        ];
        $config = new Config($values);
        $builder = new ModelBuilder();
        $model = $builder->getInterfaceClass($config, GroupInterface::class);
        $this->assertTrue($model instanceof GroupInterface);
        $this->assertTrue($model instanceof GroupTestModel);
    }

    public function testGetInterfaceClassException(): void
    {
        $this->expectException(Exchange1CException::class);
        $values = [
            'models'    => [
                GroupInterface::class => ProductTestModel::class,
            ],
        ];
        $config = new Config($values);
        $builder = new ModelBuilder();
        $builder->getInterfaceClass($config, GroupInterface::class);
    }
}
