<?php

namespace Snairbef\Regional\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snairbef\Regional\Commons\Model\Regional;

class SubDistrict extends Regional
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'district_id',
        'name',
    ];

    /**
     * Get the district that owns the SubDistrict
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
