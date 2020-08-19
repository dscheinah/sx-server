<?php
namespace Sx\ServerTest;

use Sx\Server\Application;
use PHPUnit\Framework\TestCase;
use Sx\ServerTest\Mock\MiddlewareHandler;
use Sx\ServerTest\Mock\Response;
use Sx\ServerTest\Mock\ServerRequest;

class ApplicationTest extends TestCase
{
    private $application;

    private $handler;

    protected function setUp(): void
    {
        $this->handler = new MiddlewareHandler();
        $this->application = new Application($this->handler);
    }

    public function testRun(): void
    {
        $this->expectOutputString(Response::BODY);
        $this->application->add('placeholder');
        $this->application->run(new ServerRequest());
        self::assertEquals(Response::STATUS, http_response_code());
        self::assertEquals([sprintf('%s: %s', Response::HEADER_KEY, Response::HEADER_VALUE)], xdebug_get_headers());
    }

    public function testAdd(): void
    {
        $class = 'MiddlewareClass';
        $this->application->add($class);
        self::assertEmpty($this->handler->chained);
        self::assertArrayHasKey($class, MiddlewareHandler::$globalChained);
    }
}
