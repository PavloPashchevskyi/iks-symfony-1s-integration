<?php
declare(strict_types=1);

namespace Tests\Services;

use Iks\Symfony1SIntegration\Config;
use Iks\Symfony1SIntegration\Services\AuthService;
use Iks\Symfony1SIntegration\Services\CategoryService;
use Iks\Symfony1SIntegration\Services\FileLoaderService;
use Iks\Symfony1SIntegration\Services\OfferService;
use Iks\Symfony1SIntegration\Services\SaleService;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class SaleServiceTest extends TestCase
{
    public function testCheckAuth(): void
    {
        $config = $this->createMock(Config::class);
        $request = $this->createMock(Request::class);
        $loader = $this->createMock(FileLoaderService::class);
        $auth = $this->createMock(AuthService::class);
        $auth->method('checkAuth')
            ->willReturn('success');
        $category = $this->createMock(CategoryService::class);
        $offer = $this->createMock(OfferService::class);
        $service = new SaleService($request, $config, $auth, $loader, $category, $offer);

        $this->assertEquals('success', $service->checkauth());
    }

    public function testInit(): void
    {
        $config = $this->createMock(Config::class);
        $request = $this->createMock(Request::class);
        $loader = $this->createMock(FileLoaderService::class);
        $auth = $this->createMock(AuthService::class);
        $auth->method('auth');
        $category = $this->createMock(CategoryService::class);
        $offer = $this->createMock(OfferService::class);
        $service = new SaleService($request, $config, $auth, $loader, $category, $offer);

        $this->assertTrue(is_string($service->init()));
    }

    public function testFileSendingFailure(): void
    {
        $config = $this->createMock(Config::class);
        $request = $this->createMock(Request::class);
        $loader = $this->createMock(FileLoaderService::class);
        $auth = $this->createMock(AuthService::class);
        $auth->method('auth');
        $category = $this->createMock(CategoryService::class);
        $offer = $this->createMock(OfferService::class);

        $service = new SaleService($request, $config, $auth, $loader, $category, $offer);

        $this->assertEquals("failure\n", $service->success(''));
    }

    public function testQuery(): void
    {
        $config = $this->createMock(Config::class);
        $request = $this->createMock(Request::class);
        $loader = $this->createMock(FileLoaderService::class);
        $auth = $this->createMock(AuthService::class);
        $auth->method('auth');
        $category = $this->createMock(CategoryService::class);
        $offer = $this->createMock(OfferService::class);

        $service = new SaleService($request, $config, $auth, $loader, $category, $offer);

        $queryResultStrs = explode("\n", $service->query('tests/xml/sales.xml'));

        $this->assertEquals('success', $queryResultStrs[0]);
        $this->assertEquals('tests/xml/sales.xml', $queryResultStrs[1]);
    }

    public function testFileSendingSuccess(): void
    {
        $config = $this->createMock(Config::class);
        $request = $this->createMock(Request::class);
        $loader = $this->createMock(FileLoaderService::class);
        $auth = $this->createMock(AuthService::class);
        $auth->method('auth');
        $category = $this->createMock(CategoryService::class);
        $offer = $this->createMock(OfferService::class);

        $service = new SaleService($request, $config, $auth, $loader, $category, $offer);

        $queryResultStrs = explode("\n", $service->query('tests/xml/sales.xml'));

        $this->assertEquals('success', $queryResultStrs[0]);
        $this->assertEquals('tests/xml/sales.xml', $queryResultStrs[1]);
        $this->assertEquals("success\n", $service->success('tests/xml/sales.xml'));
    }

    public function testFile(): void
    {
        $config = $this->createMock(Config::class);
        $request = $this->createMock(Request::class);
        $loader = $this->createMock(FileLoaderService::class);
        $auth = $this->createMock(AuthService::class);
        $auth->method('auth');
        $category = $this->createMock(CategoryService::class);
        $offer = $this->createMock(OfferService::class);
        $service = new SaleService($request, $config, $auth, $loader, $category, $offer);
        $loader->method('load')
            ->willReturn('success');

        $this->assertEquals('success', $service->file());
    }
}
