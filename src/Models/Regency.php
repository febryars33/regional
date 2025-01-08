<?php

namespace Snairbef\Regional\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Snairbef\Regional\Commons\Model\Regional;

class Regency extends Regional
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'province_id',
        'name',
    ];

    /**
     * Get the province that owns the Regency
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get all of the districts for the Regency
     */
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
