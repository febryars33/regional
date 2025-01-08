<?php

namespace Snairbef\Regional\Commons\Import\Regions;

use Snairbef\Regional\Commons\Import\Reader;
use Snairbef\Regional\Models\District as ModelsDistrict;

class District extends Reader
{
    public function __construct(ModelsDistrict $district)
    {
        $this->setColumns([
            'id',
            'regency_id',
            'name',
            'status',
            'created_at',
            'updated_at',
        ]);

        $this->setPath(__DIR__.'/../../../../csv/districts.csv');

        parent::__construct($district);
    }
}
