<?php

namespace Snairbef\Regional\Commons\Import\Regions;

use Snairbef\Regional\Commons\Import\Reader;
use Snairbef\Regional\Models\SubDistrict as ModelsSubDistrict;

class SubDistrict extends Reader
{
    public function __construct(ModelsSubDistrict $sub_district)
    {
        $this->setColumns([
            'id',
            'district_id',
            'name',
            'status',
            'created_at',
            'updated_at',
        ]);

        $this->setPath(__DIR__.'/../../../../csv/sub_districts.csv');

        parent::__construct($sub_district);
    }
}
