<?php

namespace Snairbef\Regional\Repositories;

use Snairbef\Regional\Commons\Repository\Repository;
use Snairbef\Regional\Commons\Repository\Traits\Pagination;
use Snairbef\Regional\Contracts\Repositories\DistrictRepository as RepositoryInterface;
use Snairbef\Regional\Models\District;

class DistrictRepository extends Repository implements RepositoryInterface
{
    use Pagination;

    public function __construct(District $district)
    {
        parent::__construct($district);
    }
}
