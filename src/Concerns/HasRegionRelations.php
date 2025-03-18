<?php

namespace Snairbef\Regional\Concerns;

use Snairbef\Regional\Concerns\Regions\BelongsTo\HasDistrict;
use Snairbef\Regional\Concerns\Regions\BelongsTo\HasProvince;
use Snairbef\Regional\Concerns\Regions\BelongsTo\HasRegency;
use Snairbef\Regional\Concerns\Regions\BelongsTo\HasSubDistrict;

trait HasRegionRelations
{
    use HasProvince, HasRegency, HasDistrict, HasSubDistrict;
}
