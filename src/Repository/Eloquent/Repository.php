<?php

declare(strict_types=1);

namespace Endeavors\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Endeavors\Repository\Support\Proxy;
use Endeavors\Repository\Contracts\Repository as RepositoryContract;
use Endeavors\Repository\Contracts\RepositoryEntity;

abstract class Repository implements RepositoryContract
{
    /**
     * The model instance
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    private $model;

    /**
     * The keyType of the model instance
     *
     * @return mixed
     */
    public function getKeyType()
    {
        return $this->getModel()->getKeyType();
    }

    /**
     * Find one instance of an entity
     * @param  mixed    $id The primary key
     * @return \Endeavors\Repository\Contracts\RepositoryEntity|null
     */
    public function find($id): ?RepositoryEntity
    {
        return null;
    }

    /**
     * Find one instance of an entity
     * @param  mixed    $id The primary key
     * @return \Endeavors\Repository\Contracts\RepositoryEntity
     * @throws \Endeavors\Repository\Exceptions\RepositoryEntityNotFoundException
     */
    public function findOrFail($id): RepositoryEntity
    {
        return null;
    }

    /**
     * Find entities using an operator given a value
     * @param  string $column The column in the table
     * @param  string $operator The operator for the query
     * @param  mixed  $value What to look for in the table
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findWhere(string $column, string $operator, $value): RepositoryEntity
    {
        return null;
    }

    /**
     * Find entities using a not operator given a value
     * @param  string $column The column in the table
     * @param  mixed  $value What to look for in the table
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findWhereNot(string $column, $value): RepositoryEntity
    {
        return $this->findWhere($column, '<>', $value);
    }

    /**
     * Find entities starting with a given a value
     * @param  string $column The column in the table
     * @param  mixed  $value What to look for in the table
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findStartsWith(string $column, $value): RepositoryEntity
    {
        return $this->findWhere($column, 'like', $value . '%');
    }

    /**
     * Find entities ending with a given value
     * @param  string $column The column in the table
     * @param  mixed  $value What to look for in the table
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findEndsWith(string $column, $value): RepositoryEntity
    {
        return $this->findWhere($column, 'like', '%' . $value);
    }

    /**
     * Find entities containing a given value
     * @param  string $column The column in the table
     * @param  mixed  $value What to look for in the table
     * @return \Endeavors\Repository\Contracts\RepositoryEntity[]
     */
    public function findContains(string $column, $value): RepositoryEntity
    {
        return $this->findWhere($column, 'like', '%' . $value . '%');
    }

    /**
     * Create a resource
     * @param  array $properties The array of the entity to be created
     * @return \Endeavors\Repository\Contracts\RepositoryEntity
     */
    public function create(array $properties): RepositoryEntity
    {

    }

    /**
     * Update a resource using an identifier
     * @param  mixed $id The unique identifier for this resource
     * @param  array $properties The values to update
     * @return \Endeavors\Repository\Contracts\RepositoryEntity
     */
    public function update($id, array $properties): RepositoryEntity
    {

    }

    /**
     * Delete a resource
     * @param  mixed $id The unique identifier to remove
     * @return int The amount of rows affected
     */
    public function delete($id): int
    {
        return 0;
    }

    /**
     * Creates a model instance
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract protected function model();

    /**
     * Acquire a new model instance if not already acquired
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function getModel(): Model
    {
        if (null === $this->model) {
            $this->model = $this->model();
        }

        return $this->model;
    }

    public function __call($method, $args)
    {
        $method = Proxy::method($method)->from([
            'where' => 'findWhere',
            'whereNot' => 'findWhereNot',
            'startsWith' => 'findStartsWith',
            'endsWith' => 'findEndsWith',
            'contains' => 'findContains'
        ]);

        if (null === $method) {
            // BadMethodCallException
        }

        return $this->$method(...$args);
    }
}
