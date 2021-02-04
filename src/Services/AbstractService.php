<?php
declare(strict_types=1);

namespace Iks\Symfony1SIntegration\Services;

use Iks\Symfony1SIntegration\Config;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractService
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var AuthService
     */
    protected $authService;

    /**
     * @var FileLoaderService
     */
    protected $loaderService;

    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @var OfferService
     */
    protected $offerService;

    /**
     * AbstractService constructor.
     *
     * @param Request           $request
     * @param Config            $config
     * @param AuthService       $authService
     * @param FileLoaderService $loaderService
     * @param CategoryService   $categoryService
     * @param OfferService      $offerService
     */
    public function __construct(
        Request $request,
        Config $config,
        AuthService $authService,
        FileLoaderService $loaderService,
        CategoryService $categoryService,
        OfferService $offerService
    ) {
        $this->request = $request;
        $this->config = $config;
        $this->authService = $authService;
        $this->loaderService = $loaderService;
        $this->categoryService = $categoryService;
        $this->offerService = $offerService;
    }
}
