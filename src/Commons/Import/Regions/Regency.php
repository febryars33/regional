<?php

namespace Snairbef\Regional\Commons\Import\Regions;

use Snairbef\Regional\Commons\Import\Reader;
use Snairbef\Regional\Models\Regency as ModelsRegency;

class Regency extends Reader
{
    public function __construct(ModelsRegency $regency)
    {
        $this->setColumns([
            'id',
            'province_id',
            'name',
            'status',
            'created_at',
            'updated_at',
        ]);

        $this->setPath(__DIR__.'/../../../../csv/regencies.csv');

        parent::__construct($regency);
    }
}
