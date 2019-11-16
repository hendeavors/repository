<?php

namespace Endeavors\Repository\Eloquent;

use Endeavors\Repository\Contracts\RepositoryEntity;

class Entity implements RepositoryEntity
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __get($name)
    {
        return $this->value->{$name};
    }

    public function __call($method, $args)
    {
        return $this->value->{$method}($args);
    }
}
