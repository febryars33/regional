<?php

namespace Snairbef\Regional\Concerns\Regions\BelongsTo;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snairbef\Regional\Models\Regency;

trait HasRegency
{
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
}
