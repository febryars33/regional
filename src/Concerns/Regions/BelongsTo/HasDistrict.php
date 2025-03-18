<?php

namespace Snairbef\Regional\Concerns\Regions\BelongsTo;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snairbef\Regional\Models\District;

trait HasDistrict
{
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
