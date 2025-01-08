<?php

namespace Snairbef\Regional\Repositories;

use Snairbef\Regional\Commons\Repository\Repository;
use Snairbef\Regional\Commons\Repository\Traits\Pagination;
use Snairbef\Regional\Contracts\Repositories\ProvinceRepository as Contract;
use Snairbef\Regional\Models\Province;

class ProvinceRepository extends Repository implements Contract
{
    use Pagination;

    public function __construct(Province $province)
    {
        parent::__construct($province);
    }
}
