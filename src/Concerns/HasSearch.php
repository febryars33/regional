<?php

namespace Snairbef\Regional\Concerns;

use Closure;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property string $name
 *
 * @method Builder search(Closure|string|null $keyword = null)
 */
trait HasSearch
{
    /**
     * Scope a query to only include models matching the search keyword.
     */
    public function scopeSearch(Builder $query, Closure|string|null $keyword = null): void
    {
        if ($keyword instanceof Closure) {
            $keyword($query, $keyword);
        } else {
            $query->where('name', 'like', '%'.$keyword.'%');
        }
    }
}
