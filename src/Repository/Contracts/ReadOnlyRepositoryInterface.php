<?php

namespace Endeavors\Repository\Contracts;

use Endeavors\Repository\Contracts\RepositoryEntity;

interface ReadOnlyRepositoryInterface
{
    /**
     * Find one instance of an entity
     * @param  mixed    $id The primary key
     * @return \Endeavors\Repository\Contracts\RepositoryEntity|null
     */
    public function find($id): ?RepositoryEntity;

    /**
     * Find one instance of an entity
     * @param  mixed    $id The primary key
     * @return \Endeavors\Repository\Contracts\RepositoryEntity
     * @throws \Endeavors\Repository\Exceptions\RepositoryEntityNotFoundException
     */
    public function findOrFail(int $id): RepositoryEntity;

    /**
     * Find entities matching a value
     * @param  mixed    $id The primary key
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findWhere($column, $value): RepositoryEntity;

    /**
     * Find entities not matching a value
     * @param  mixed    $id The primary key
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findWhereNot($column, $value): RepositoryEntity;
}
