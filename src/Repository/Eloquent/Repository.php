<?php

declare(strict_types=1);

namespace Endeavors\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Endeavors\Repository\Contracts\Repository as RepositoryContract;

abstract class Repository implements RepositoryContract
{
    /**
     * The model instance
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    private $model;

    /**
     * The proxy method map for use with magic call
     *
     * @var array
     */
    private $proxyMap = [
        'where' => 'findWhere',
        'whereNot' => 'findWhereNot',
        'startsWith' => 'findStartsWith',
        'endsWith' => 'findEndsWith',
        'contains' => 'findContains'
    ];

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
        $map = $this->proxyMap[$method] ?? null;

        if (null === $method) {
            // BadMethodCallException
        }

        return $this->$map(...$args);
    }
}
