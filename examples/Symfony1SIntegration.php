<?php
declare(strict_types=1);

require_once './vendor/autoload.php';

$configValues = [
    'import_dir'    => '1c_exchange',
    'login'         => 'admin',
    'password'      => 'admin',
    'use_zip'       => false,
    'file_part'     => 0,
    'models'        => [
        \Iks\Symfony1SIntegration\Interfaces\GroupInterface::class   => \Tests\Models\GroupTestModel::class,
        \Iks\Symfony1SIntegration\Interfaces\ProductInterface::class => \Tests\Models\ProductTestModel::class,
        \Iks\Symfony1SIntegration\Interfaces\OfferInterface::class   => \Tests\Models\OfferTestModel::class,
    ],
];
$config = new \Iks\Symfony1SIntegration\Config($configValues);
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$symfonyDispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
$dispatcher = new \Iks\Symfony1SIntegration\SymfonyEventDispatcher($symfonyDispatcher);
$modelBuilder = new \Iks\Symfony1SIntegration\ModelBuilder();
$loaderService = new \Iks\Symfony1SIntegration\Services\FileLoaderService($request, $config);
$authService = new \Iks\Symfony1SIntegration\Services\AuthService($request, $config);
$categoryService = new \Iks\Symfony1SIntegration\Services\CategoryService($request, $config, $dispatcher, $modelBuilder);
$offerService = new \Iks\Symfony1SIntegration\Services\OfferService($request, $config, $dispatcher, $modelBuilder);
$catalogService = new \Iks\Symfony1SIntegration\Services\CatalogService($request, $config, $authService, $loaderService, $categoryService, $offerService);

$mode = $request->get('mode');
$type = $request->get('type');

try {
    if ($type == 'catalog') {
        if (!method_exists($catalogService, $mode)) {
            throw new Exception('not correct request, mode='.$mode);
        }
        $body = $catalogService->$mode();
        $response = new \Symfony\Component\HttpFoundation\Response($body, 200, ['Content-Type', 'text/plain']);
        $response->send();
    } else {
        throw new \LogicException(sprintf('Logic for method %s not released', $type));
    }
} catch (\Exception $e) {
    $body = "failure\n";
    $body .= $e->getMessage()."\n";
    $body .= $e->getFile()."\n";
    $body .= $e->getLine()."\n";

    $response = new \Symfony\Component\HttpFoundation\Response($body, 500, ['Content-Type', 'text/plain']);
    $response->send();
}
