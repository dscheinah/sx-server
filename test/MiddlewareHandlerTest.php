<?php
namespace Sx\ServerTest;

use PHPUnit\Framework\TestCase;
use Sx\Container\Injector;
use Sx\Server\MiddlewareHandler;
use Sx\Server\MiddlewareHandlerException;
use Sx\ServerTest\Mock\Middleware;
use Sx\ServerTest\Mock\RequestHandler;
use Sx\ServerTest\Mock\Response;
use Sx\ServerTest\Mock\ServerRequest;

class MiddlewareHandlerTest extends TestCase
{
    private $handler;

    protected function setUp(): void
    {
        $injector = new Injector();
        $injector->set(Middleware::class, Middleware::class);
        $injector->set(RequestHandler::class, RequestHandler::class);
        $injector->set(Response::class, Response::class);
        $this->handler = new MiddlewareHandler($injector);
    }

    public function test(): void
    {
        $this->handler->chain(Middleware::class);
        $this->handler->chain(RequestHandler::class);
        $this->handler->handle(new ServerRequest());
        self::assertTrue(true);
    }

    public function testNoChain(): void
    {
        $this->expectException(MiddlewareHandlerException::class);
        $this->handler->handle(new ServerRequest());
    }

    public function testInjectorError(): void
    {
        $this->expectException(MiddlewareHandlerException::class);
        $this->handler->chain('invalid');
        $this->handler->handle(new ServerRequest());
    }

    public function testWrongClass(): void
    {
        $this->expectException(MiddlewareHandlerException::class);
        $this->handler->chain(Response::class);
        $this->handler->handle(new ServerRequest());
    }
}
