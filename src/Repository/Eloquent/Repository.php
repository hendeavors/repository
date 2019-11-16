<?php

namespace Endeavors\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Endeavors\Repository\Contracts\RepositoryInterface;

abstract class Repository implements RepositoryInterface
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
}
