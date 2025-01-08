<?php

namespace Snairbef\Regional\Commons\Repository;

use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LogicException;
use Snairbef\Regional\Commons\Repository\Interface\RepositoryInterface;

class Repository implements RepositoryInterface
{
    /**
     * The model instance.
     *
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all of the models from the database.
     */
    public function all(array|string $columns = ['*']): Collection
    {
        return $this->model->all($columns);
    }

    /**
     * Begin querying the model.
     */
    public function query(): Builder
    {
        return $this->model->query();
    }

    /**
     * Begin querying a model with eager loading.
     */
    public function with(array|string $relations)
    {
        return $this->model::with($relations);
    }

    /**
     * Find a model by its primary key.
     */
    public function find(int $id, array $with = [], array|string $columns = ['*']): ?Model
    {
        return $this->model->with($with)->find($id, $columns);
    }

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail(int $id, array $with = [], array|string $columns = ['*']): Model
    {
        return $this->model->with($with)->findOrFail($id, $columns);
    }

    /**
     * Save a new model and return the instance.
     */
    public function create(array $attributes = []): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * Update records in the database.
     */
    public function update(int $id, array $attributes): bool
    {
        return $this->findOrFail($id)->update($attributes);
    }

    /**
     * Delete records from the database.
     *
     * @throws LogicException
     */
    public function delete(int $id): ?bool
    {
        return $this->model::query()->find($id)->delete();
    }

    /**
     * Retrieve the "count" result of the query.
     */
    public function count(Expression|string $columns = '*'): int
    {
        return $this->model::count($columns);
    }

    /**
     * Execute the query and get the first result.
     */
    public function first(array|string $columns = ['*']): ?Model
    {
        return $this->model::first($columns);
    }
}
