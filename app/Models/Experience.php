<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Experience extends Model
{
    use HasFactory;
    use HasTags;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'department',
        'type',
        'description',
        'started_at',
        'ended_at',
        'company_id',
    ];

    protected function casts(): array
    {
        return [
            'started_at' => 'datetime',
            'ended_at' => 'datetime',
        ];
    }

    /**
     * Get the company for the certification.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
