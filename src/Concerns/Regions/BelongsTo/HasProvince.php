<?php

namespace Snairbef\Regional\Concerns\Regions\BelongsTo;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snairbef\Regional\Models\Province;

trait HasProvince
{
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
