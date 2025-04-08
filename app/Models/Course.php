<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Course extends Model
{
    use HasFactory;
    use HasTags;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'short',
        'type',
        'issued_at',
        'company_id',
        'file_path',
    ];

    protected function casts(): array
    {
        return [
            'issued_at' => 'datetime',
        ];
    }

    /**
     * Get the company for the course.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
