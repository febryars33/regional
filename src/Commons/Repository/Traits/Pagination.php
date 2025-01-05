<?php

namespace Snairbef\Regional\Commons\Repository\Traits;

use Closure;
use Illuminate\Pagination\LengthAwarePaginator;
use Snairbef\Regional\Commons\Model\Regional;

/**
 * Pagination trait
 *
 * @property-read Regional $model
 */
trait Pagination
{
    use Search;

    /**
     * Get the number of models to return per page.
     */
    public function getPerPage(): int
    {
        return $this->model->getPerPage();
    }

    /**
     * Set the number of models to return per page.
     */
    public function setPerPage(int $perPage): self
    {
        $this->model->setPerPage($perPage);

        return $this;
    }

    /**
     * Paginate the given query.
     */
    public function paginate(Closure|string|null $keyword = null, array $columns = ['*']): LengthAwarePaginator
    {
        return $this->search($keyword)->paginate($this->getPerPage(), $columns);
    }
}
