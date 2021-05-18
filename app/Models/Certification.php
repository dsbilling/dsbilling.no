<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'short',
        'identifier',
        'issued_at',
        'expiration_at',
        'company_id',
    ];

    protected $dates = ['issued_at', 'expiration_at'];

    /**
     * Get the company for the certification.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
