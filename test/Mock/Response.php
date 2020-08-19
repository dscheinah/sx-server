<?php
namespace Sx\ServerTest\Mock;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class Response implements ResponseInterface
{
    public const BODY = 'body';
    public const STATUS = 404;
    public const HEADER_KEY = 'header';
    public const HEADER_VALUE = 'line';

    public function getProtocolVersion()
    {
    }

    public function withProtocolVersion($version)
    {
    }

    public function getHeaders(): array
    {
        return [self::HEADER_KEY => [self::HEADER_VALUE]];
    }

    public function hasHeader($name)
    {
    }

    public function getHeader($name)
    {
    }

    public function getHeaderLine($name)
    {
    }

    public function withHeader($name, $value)
    {
    }

    public function withAddedHeader($name, $value)
    {
    }

    public function withoutHeader($name)
    {
    }

    public function getBody(): string
    {
        return self::BODY;
    }

    public function withBody(StreamInterface $body)
    {
    }

    public function getStatusCode(): int
    {
        return self::STATUS;
    }

    public function withStatus($code, $reasonPhrase = '')
    {
    }

    public function getReasonPhrase()
    {
    }
}
