<?php

namespace Snairbef\Regional\Commons\Import\Regions;

use Snairbef\Regional\Commons\Import\Reader;
use Snairbef\Regional\Models\Province as ModelsProvince;

class Province extends Reader
{
    public function __construct(ModelsProvince $province)
    {
        $this->setColumns([
            'id',
            'name',
            'status',
            'created_at',
            'updated_at',
        ]);

        $this->setPath(__DIR__.'/../../../../csv/provinces.csv');

        parent::__construct($province);
    }
}
