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
     * Delete a resource
     * @param  mixed $id The unique identifier to remove
     * @return int The amount of rows affected
     */
    public function delete($id): int;
}
