<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    protected $fillable = [
        'major_id',
        'name',
        'level',
        'is_active',
    ];

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }
}
