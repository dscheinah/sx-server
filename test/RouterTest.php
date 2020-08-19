<?php
namespace Sx\ServerTest;

use RuntimeException;
use Sx\Server\Router;
use PHPUnit\Framework\TestCase;
use Sx\ServerTest\Mock\Middleware;
use Sx\ServerTest\Mock\MiddlewareHandler;
use Sx\ServerTest\Mock\RequestHandler;
use Sx\ServerTest\Mock\ServerRequest;

class RouterTest extends TestCase
{
    public function test(): void
    {
        $handler = new MiddlewareHandler();
        $router = new Router($handler);

        $router->get('/test', Middleware::class);
        $router->post('/test', RequestHandler::class);
        $router->post('post', Middleware::class);
        $router->put('put', RequestHandler::class);
        $router->head('head', Middleware::class);
        $router->options('options', RequestHandler::class);
        $router->options('options', Middleware::class);
        $router->patch('patch', RequestHandler::class);
        $router->delete('delete', Middleware::class);

        self::assertEmpty($handler->chained);
        self::assertEquals(5, MiddlewareHandler::$globalChained[Middleware::class]);
        self::assertEquals(4, MiddlewareHandler::$globalChained[RequestHandler::class]);

        $requestHandler = new RequestHandler();
        $requestHandler->error = true;
        $request = new ServerRequest();

        $request->method = 'get';
        $request->path = 'test';
        $router->process($request, $requestHandler);
        $request->method = 'post';
        $router->process($request, $requestHandler);
        $request->path = 'post';
        $router->process($request, $requestHandler);
        $request->method = 'put';
        $request->path = 'put';
        $router->process($request, $requestHandler);
        $request->method = 'head';
        $request->path = 'head';
        $router->process($request, $requestHandler);
        $request->method = 'options';
        $request->path = 'options';
        $router->process($request, $requestHandler);
        $request->method = 'patch';
        $request->path = 'patch';
        $router->process($request, $requestHandler);
        $request->method = 'delete';
        $request->path = 'delete';
        $router->process($request, $requestHandler);

        $this->expectException(RuntimeException::class);
        $request->path = 'test';
        $router->process($request, $requestHandler);
    }
}
