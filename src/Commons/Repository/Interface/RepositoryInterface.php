<?php

namespace Snairbef\Regional\Commons\Repository\Interface;

use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LogicException;

interface RepositoryInterface
{
    /**
     * Get all of the models from the database.
     */
    public function all(array|string $columns = ['*']): Collection;

    /**
     * Begin querying the model.
     */
    public function query(): Builder;

    /**
     * Begin querying a model with eager loading.
     */
    public function with(array|string $relations);

    /**
     * Find a model by its primary key.
     */
    public function find(int $id, array $with = [], array|string $columns = ['*']): ?Model;

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail(int $id, array $with = [], array|string $columns = ['*']): Model;

    /**
     * Save a new model and return the instance.
     */
    public function create(array $attributes = []): Model;

    /**
     * Update records in the database.
     */
    public function update(int $id, array $data): bool;

    /**
     * Delete records from the database.
     *
     * @throws LogicException
     */
    public function delete(int $id): ?bool;

    /**
     * Retrieve the "count" result of the query.
     */
    public function count(Expression|string $columns = '*'): int;

    /**
     * Execute the query and get the first result.
     */
    public function first(array|string $columns = ['*']): ?Model;
}
