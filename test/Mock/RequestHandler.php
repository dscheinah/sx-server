<?php
namespace Sx\ServerTest\Mock;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RuntimeException;

class RequestHandler implements RequestHandlerInterface
{
    public $error = false;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if ($this->error) {
            throw new RuntimeException('');
        }
        return new Response();
    }
}
