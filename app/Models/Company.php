<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Get the certifications for the company.
     */
    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }
}
