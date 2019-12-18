<?php

namespace Endeavors\Repository\Contracts;

use Endeavors\Repository\Contracts\RepositoryEntity;

interface WriteOnlyRepository
{
    /**
     * Create a resource
     * @param  array $properties The array of the entity to be created
     * @return \Endeavors\Repository\Contracts\RepositoryEntity
     */
    public function create(array $properties): RepositoryEntity;

    /**
     * Update a resource using an identifier
     * @param  mixed $id The unique identifier for this resource
     * @param  array $properties The values to update
     * @return \Endeavors\Repository\Contracts\RepositoryEntity
     */
    public function update($id, array $properties): RepositoryEntity;

    /**
     * Update a resource using an identifier
     * @param  mixed $where The criteria to perform the update
     * @param  array $properties The values to update
     * @return int The amount of rows affected
     */
    public function updateWhere($where, array $properties): int;

    /**
     * Delete a resource
     * @param  mixed $id The unique identifier to remove
     * @return int The amount of rows affected
     */
    public function delete($id): int;
}
