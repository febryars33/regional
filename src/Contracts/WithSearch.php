<?php

namespace Snairbef\Regional\Contracts;

use Closure;
use Illuminate\Database\Eloquent\Builder;

interface WithSearch
{
    /**
     * Query to only include models matching the search keyword.
     */
    public function search(Closure|string|null $keyword = null): Builder;
}
