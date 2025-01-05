<?php

namespace Snairbef\Regional\Commons\Repository\Traits;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Snairbef\Regional\Commons\Model\Regional;

/**
 * Search trait
 *
 * @property-read Regional $model
 */
trait Search
{
    /**
     * Query to only include models matching the search keyword.
     */
    public function search(Closure|string|null $keyword = null): Builder
    {
        return $this->model->search($keyword);
    }
}
