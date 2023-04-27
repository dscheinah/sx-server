<?php
namespace Sx\ServerTest\Mock;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Sx\Message\StreamFactory;

class Response implements ResponseInterface
{
    public const BODY = 'body';
    public const STATUS = 404;
    public const HEADER_KEY = 'header';
    public const HEADER_VALUE = 'line';

    public function getProtocolVersion(): string
    {
        return '';
    }

    public function withProtocolVersion($version): MessageInterface
    {
        return $this;
    }

    public function getHeaders(): array
    {
        return [self::HEADER_KEY => [self::HEADER_VALUE]];
    }

    public function hasHeader($name): bool
    {
        return false;
    }

    public function getHeader($name): array
    {
        return [];
    }

    public function getHeaderLine($name): string
    {
        return '';
    }

    public function withHeader($name, $value): MessageInterface
    {
        return $this;
    }

    public function withAddedHeader($name, $value): MessageInterface
    {
        return $this;
    }

    public function withoutHeader($name): MessageInterface
    {
        return $this;
    }

    public function getBody(): StreamInterface
    {
        return (new StreamFactory())->createStream(self::BODY);
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        return $this;
    }

    public function getStatusCode(): int
    {
        return self::STATUS;
    }

    public function withStatus($code, $reasonPhrase = ''): ResponseInterface
    {
        return $this;
    }

    public function getReasonPhrase(): string
    {
        return '';
    }
}
