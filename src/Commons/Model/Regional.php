<?php

namespace Snairbef\Regional\Commons\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Snairbef\Regional\Concerns\HasSearch;
use Snairbef\Regional\Models\Scopes\StatusScope;

/**
 * Regional abstract class
 *
 * @property int $id
 * @property string $name
 * @property bool $status
 */
abstract class Regional extends Model
{
    use HasSearch, SoftDeletes;

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new StatusScope);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}
