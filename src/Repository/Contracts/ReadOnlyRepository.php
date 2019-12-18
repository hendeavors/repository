<?php

namespace Endeavors\Repository\Contracts;

use Endeavors\Repository\Contracts\RepositoryEntity;

interface ReadOnlyRepository
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
    public function findOrFail($id): RepositoryEntity;

    /**
     * Find entities using an operator given a value
     * @param  string $column The column in the table
     * @param  string $operator The operator for the query
     * @param  mixed  $value What to look for in the table
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findWhere(string $column, string $operator, $value): RepositoryEntity;
}
