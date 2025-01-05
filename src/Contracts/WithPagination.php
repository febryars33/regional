<?php

namespace Snairbef\Regional\Contracts;

use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface WithPagination
{
    /**
     * Get the number of models to return per page.
     */
    public function getPerPage(): int;

    /**
     * Set the number of models to return per page.
     */
    public function setPerPage(int $perPage): self;

    /**
     * Paginate the given query.
     */
    public function paginate(Closure|string|null $keyword = null, array $columns = ['*']): LengthAwarePaginator;
}
