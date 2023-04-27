<?php
namespace Sx\ServerTest\Mock;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Sx\Message\Stream;

class ServerRequest implements ServerRequestInterface
{
    public $method = '';

    public $path = '';

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
        return [];
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
        return new Stream();
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        return $this;
    }

    public function getRequestTarget(): string
    {
        return '';
    }

    public function withRequestTarget($requestTarget): RequestInterface
    {
        return $this;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function withMethod($method): RequestInterface
    {
        return $this;
    }

    public function getUri(): UriInterface
    {
        return new Uri($this->path);
    }

    public function withUri(UriInterface $uri, $preserveHost = false): RequestInterface
    {
        return $this;
    }

    public function getServerParams(): array
    {
        return [];
    }

    public function getCookieParams(): array
    {
        return [];
    }

    public function withCookieParams(array $cookies): ServerRequestInterface
    {
        return $this;
    }

    public function getQueryParams(): array
    {
        return [];
    }

    public function withQueryParams(array $query): ServerRequestInterface
    {
        return $this;
    }

    public function getUploadedFiles(): array
    {
        return [];
    }

    public function withUploadedFiles(array $uploadedFiles): ServerRequestInterface
    {
        return $this;
    }

    public function getParsedBody()
    {
    }

    public function withParsedBody($data): ServerRequestInterface
    {
        return $this;
    }

    public function getAttributes(): array
    {
        return [];
    }

    public function getAttribute($name, $default = null)
    {
    }

    public function withAttribute($name, $value): ServerRequestInterface
    {
        return $this;
    }

    public function withoutAttribute($name): ServerRequestInterface
    {
        return $this;
    }
}
