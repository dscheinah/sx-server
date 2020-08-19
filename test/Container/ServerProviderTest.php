<?php
namespace Sx\ServerTest\Container;

use Sx\Container\Injector;
use Sx\Server\Container\ServerProvider;
use PHPUnit\Framework\TestCase;
use Sx\Server\MiddlewareHandlerInterface;

class ServerProviderTest extends TestCase
{
    public function testProvide(): void
    {
        $injector = new Injector();
        $provider = new ServerProvider();
        $provider->provide($injector);
        self::assertTrue($injector->has(MiddlewareHandlerInterface::class));
    }
}
