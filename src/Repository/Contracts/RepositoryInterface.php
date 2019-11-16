<?php

namespace Endeavors\Repository\Contracts;

use Endeavors\Repository\Contracts\RepositoryEntity;
use Endeavors\Repository\Contracts\ReadOnlyRepositoryInterface;
use Endeavors\Repository\Contracts\WriteOnlyRepositoryInterface;

interface RepositoryInterface extends
    ReadOnlyRepositoryInterface,
    WriteOnlyRepositoryInterface
{
}
