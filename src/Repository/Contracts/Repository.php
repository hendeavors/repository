<?php

namespace Endeavors\Repository\Contracts;

use Endeavors\Repository\Contracts\RepositoryEntity;
use Endeavors\Repository\Contracts\ReadOnlyRepository;
use Endeavors\Repository\Contracts\WriteOnlyRepository;

interface Repository extends
    ReadOnlyRepository,
    WriteOnlyRepository
{
}
