<?php

namespace Snairbef\Regional\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Snairbef\Regional\Commons\Model\Regional;

class District extends Regional
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'regency_id',
        'name',
    ];

    /**
     * Get the regency that owns the District
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    /**
     * Get all of the sub_districts for the District
     */
    public function sub_districts(): HasMany
    {
        return $this->hasMany(SubDistrict::class);
    }
}
