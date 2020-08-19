<?php
namespace Sx\ServerTest;

use Sx\Container\Injector;
use Sx\Server\MiddlewareHandlerFactory;
use PHPUnit\Framework\TestCase;
use Sx\Server\MiddlewareHandlerInterface;

class MiddlewareHandlerFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $factory = new MiddlewareHandlerFactory();
        $factory->create(new Injector(), [], MiddlewareHandlerInterface::class);
        self::assertTrue(true);
    }
}
