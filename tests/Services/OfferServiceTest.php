<?php
declare(strict_types=1);

namespace Tests\Services;

use Iks\Symfony1SIntegration\Config;
use Iks\Symfony1SIntegration\Interfaces\EventDispatcherInterface;
use Iks\Symfony1SIntegration\ModelBuilder;
use Iks\Symfony1SIntegration\Services\OfferService;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class OfferServiceTest extends TestCase
{
    public function testImport(): void
    {
        $configValues = [
            'import_dir' => __DIR__.'/../xml',
            'models'     => [
                \Iks\Symfony1SIntegration\Interfaces\GroupInterface::class   => \Tests\Models\GroupTestModel::class,
                \Iks\Symfony1SIntegration\Interfaces\ProductInterface::class => \Tests\Models\ProductTestModel::class,
                \Iks\Symfony1SIntegration\Interfaces\OfferInterface::class   => \Tests\Models\OfferTestModel::class,
            ],
        ];

        $config = new Config($configValues);
        $request = $this->createMock(Request::class);
        $dispatcher = $this->createMock(EventDispatcherInterface::class);
        $builder = new ModelBuilder();
        $request->method('get')
            ->with('filename')
            ->willReturn('offers.xml');

        $service = new OfferService($request, $config, $dispatcher, $builder);
        $this->assertNull($service->import());
    }
}
