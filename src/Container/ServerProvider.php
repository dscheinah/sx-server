<?php
namespace Sx\Server\Container;

use Sx\Container\Injector;
use Sx\Container\ProviderInterface;
use Sx\Server\MiddlewareHandlerFactory;
use Sx\Server\MiddlewareHandlerInterface;

/**
 * Provider for the sx-container injectors setup method.
 */
class ServerProvider implements ProviderInterface
{
    /**
     * Registers the default factory for the middleware handler to the injector.
     *
     * @param Injector $injector
     */
    public function provide(Injector $injector): void
    {
        $injector->set(MiddlewareHandlerInterface::class, MiddlewareHandlerFactory::class);
    }
}
