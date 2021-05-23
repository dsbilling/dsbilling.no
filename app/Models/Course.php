<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'short',
        'type',
        'issued_at',
        'company_id',
    ];

    protected $dates = ['issued_at'];

    /**
     * Get the company for the course.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
