<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Certification extends Model
{
    use HasFactory;
    use HasTags;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'short',
        'identifier',
        'issued_at',
        'expiration_at',
        'company_id',
        'file_path',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expiration_at' => 'datetime',
    ];

    /**
     * Get the company for the certification.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
