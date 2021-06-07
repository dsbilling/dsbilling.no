<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTags;
    
    protected $fillable = [
        'title',
        'department',
        'type',
        'description',
        'started_at',
        'ended_at',
        'company_id',
    ];

    protected $dates = ['started_at', 'ended_at'];

    /**
     * Get the company for the certification.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}