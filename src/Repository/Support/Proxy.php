<?php

namespace Endeavors\Repository\Support;

class Proxy
{
    private $method;

    private function __construct(string $method)
    {
        $this->method = $method;
    }

    public static function method(string $method)
    {
        return new static($method);
    }

    public function from(array $proxies)
    {
        return $proxies[$this->method] ?? null;
    }
}
