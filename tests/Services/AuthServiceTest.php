<?php
declare(strict_types=1);

namespace Tests\Services;

use Iks\Symfony1SIntegration\Config;
use Iks\Symfony1SIntegration\Exceptions\Exchange1CException;
use Iks\Symfony1SIntegration\Services\AuthService;
use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ServerBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    public function testCheckAuth(): void
    {
        $values = [
            'login'      => 'logintest',
            'password'   => 'passwordtest',
        ];
        $config = new Config($values);
        $request = $this->createMock(Request::class);
        $request->server = $this->createMock(ServerBag::class);
        $request->server
            ->expects($this->exactly(2))
            ->method('get')
            ->withConsecutive(['PHP_AUTH_USER'], ['PHP_AUTH_PW'])
            ->willReturnOnConsecutiveCalls('logintest', 'passwordtest');
        $session = $this->createMock(SessionInterface::class);
        $request->method('getSession')
            ->willReturn($session);

        $authService = new AuthService($request, $config);
        $response = $authService->checkAuth();
        $this->assertTrue(strpos($response, 'success') === 0);
    }

    public function testCheckAuthIlluminate(): void
    {
        $values = [
            'login'      => 'logintest',
            'password'   => 'passwordtest',
        ];
        $config = new Config($values);
        $request = $this->createMock(Request::class);
        $request->server = $this->createMock(ServerBag::class);
        $request->server
            ->expects($this->exactly(2))
            ->method('get')
            ->withConsecutive(['PHP_AUTH_USER'], ['PHP_AUTH_PW'])
            ->willReturnOnConsecutiveCalls('logintest', 'passwordtest');
        $session = $this->createMock(Session::class);
        $request->method('getSession')
            ->willReturn($session);

        $authService = new AuthService($request, $config);
        $response = $authService->checkAuth();
        $this->assertTrue(strpos($response, 'success') === 0);
    }

    public function testCheckAuthFail(): void
    {
        $values = [
            'login'      => 'logintest',
            'password'   => 'passwordtest',
        ];
        $config = new Config($values);
        $request = $this->createMock(Request::class);
        $request->server = $this->createMock(ServerBag::class);
        $request->server
            ->expects($this->exactly(2))
            ->method('get')
            ->withConsecutive(['PHP_AUTH_USER'], ['PHP_AUTH_PW'])
            ->willReturnOnConsecutiveCalls('logintest', 'falledpassword');
        $session = $this->createMock(SessionInterface::class);
        $request->method('getSession')
            ->willReturn($session);

        $authService = new AuthService($request, $config);
        $response = $authService->checkAuth();
        $this->assertTrue(strpos($response, 'failure') === 0);
    }

    public function testAuth(): void
    {
        $values = [
            'login'      => 'logintest',
            'password'   => 'passwordtest',
        ];
        $config = new Config($values);
        $request = $this->createMock(Request::class);
        $session = $this->createMock(SessionInterface::class);
        $session->method('get')
            ->willReturn('logintest');
        $request->method('getSession')
            ->willReturn($session);

        $authService = new AuthService($request, $config);
        $this->assertNull($authService->auth());
    }

    public function testAuthException(): void
    {
        $this->expectException(Exchange1CException::class);
        $values = [
            'login'      => 'logintest',
            'password'   => 'passwordtest',
        ];
        $config = new Config($values);
        $request = $this->createMock(Request::class);
        $session = $this->createMock(SessionInterface::class);
        $session->method('get')
            ->willReturn(null);
        $request->method('getSession')
            ->willReturn($session);

        $authService = new AuthService($request, $config);
        $authService->auth();
    }
}
