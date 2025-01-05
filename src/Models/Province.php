<?php

namespace Snairbef\Regional\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Snairbef\Regional\Commons\Model\Regional;

class Province extends Regional
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the regencies for the Province
     */
    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class);
    }
}
