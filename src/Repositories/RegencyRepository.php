<?php

namespace Snairbef\Regional\Repositories;

use Snairbef\Regional\Commons\Repository\Repository;
use Snairbef\Regional\Commons\Repository\Traits\Pagination;
use Snairbef\Regional\Contracts\Repositories\RegencyRepository as RepositoryInterface;
use Snairbef\Regional\Models\Regency;

class RegencyRepository extends Repository implements RepositoryInterface
{
    use Pagination;

    public function __construct(Regency $regency)
    {
        parent::__construct($regency);
    }
}
