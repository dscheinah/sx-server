<?php
namespace Sx\ServerTest\Mock;

use Psr\Http\Message\UriInterface;

class Uri implements UriInterface
{
    private $path;

    public function __construct(string $path = '')
    {
        $this->path = $path;
    }

    public function getScheme()
    {
    }

    public function getAuthority()
    {
    }

    public function getUserInfo()
    {
    }

    public function getHost()
    {
    }

    public function getPort()
    {
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getQuery()
    {
    }

    public function getFragment()
    {
    }

    public function withScheme($scheme)
    {
    }

    public function withUserInfo($user, $password = null)
    {
    }

    public function withHost($host)
    {
    }

    public function withPort($port)
    {
    }

    public function withPath($path)
    {
    }

    public function withQuery($query)
    {
    }

    public function withFragment($fragment)
    {
    }

    public function __toString()
    {
        return '';
    }

}
