<?php

namespace Snairbef\Regional\Repositories;

use Snairbef\Regional\Commons\Repository\Repository;
use Snairbef\Regional\Commons\Repository\Traits\Pagination;
use Snairbef\Regional\Contracts\Repositories\SubDistrictRepository as Contract;
use Snairbef\Regional\Models\SubDistrict;

class SubDistrictRepository extends Repository implements Contract
{
    use Pagination;

    public function __construct(SubDistrict $sub_district)
    {
        parent::__construct($sub_district);
    }
}
