<?php
namespace Sx\ServerTest\Mock;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Sx\Server\MiddlewareHandlerException;
use Sx\Server\MiddlewareHandlerInterface;

class MiddlewareHandler implements MiddlewareHandlerInterface
{
    public static $globalChained = [];

    public $chained = [];

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!$this->chained) {
            throw new MiddlewareHandlerException('');
        }
        return new Response();
    }

    public function chain(string $middleware): void
    {
        if (isset($this->chained[$middleware])) {
            $this->chained[$middleware]++;
        } else {
            $this->chained[$middleware] = 1;
        }
        if (isset(self::$globalChained[$middleware])) {
            self::$globalChained[$middleware]++;
        } else {
            self::$globalChained[$middleware] = 1;
        }
    }
}
