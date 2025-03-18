<?php

namespace Snairbef\Regional\Concerns\Regions\BelongsTo;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snairbef\Regional\Models\SubDistrict;

trait HasSubDistrict
{
    public function sub_district(): BelongsTo
    {
        return $this->belongsTo(SubDistrict::class);
    }
}
