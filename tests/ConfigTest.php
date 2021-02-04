<?php
declare(strict_types=1);

namespace Tests;

use Iks\Symfony1SIntegration\Config;
use Iks\Symfony1SIntegration\Interfaces\GroupInterface;
use Iks\Symfony1SIntegration\Interfaces\OfferInterface;
use Iks\Symfony1SIntegration\Interfaces\ProductInterface;

class ConfigTest extends TestCase
{
    public function testConfigure()
    {
        $values = [
            'import_dir' => '1c_exchange',
            'login'      => 'logintest',
            'password'   => 'passwordtest',
            'use_zip'    => true,
            'file_part'  => 500,
            'models'     => [
                GroupInterface::class   => 'CategoryTestClass',
                ProductInterface::class => 'ProductTestClass',
                OfferInterface::class   => 'OfferTestClass',
            ],
        ];
        $config = new Config($values);

        $this->assertEquals($values['import_dir'], $config->getImportDir());
        $this->assertEquals($values['login'], $config->getLogin());
        $this->assertEquals($values['password'], $config->getPassword());
        $this->assertEquals($values['use_zip'], $config->isUseZip());
        $this->assertEquals($values['file_part'], $config->getFilePart());
        $this->assertEquals($values['models'][GroupInterface::class], $config->getModelClass(GroupInterface::class));
        $this->assertEquals($values['models'][ProductInterface::class], $config->getModelClass(ProductInterface::class));
        $this->assertEquals($values['models'][OfferInterface::class], $config->getModelClass(OfferInterface::class));
        $this->assertEquals($values['models'], $config->getModels());
        $this->assertNull($config->getModelClass(self::class));
        $this->assertEquals($values['import_dir'].DIRECTORY_SEPARATOR.'test.xml', $config->getFullPath('test.xml'));
    }
}
