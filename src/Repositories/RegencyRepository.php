<?php

namespace Snairbef\Regional\Repositories;

use Snairbef\Regional\Commons\Repository\Repository;
use Snairbef\Regional\Commons\Repository\Traits\Pagination;
use Snairbef\Regional\Contracts\Repositories\RegencyRepository as Contract;
use Snairbef\Regional\Models\Regency;

class RegencyRepository extends Repository implements Contract
{
    use Pagination;

    public function __construct(Regency $regency)
    {
        parent::__construct($regency);
    }
}
