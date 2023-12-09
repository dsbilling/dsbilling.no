<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Get the certifications for the company.
     */
    public function certifications(): HasMany
    {
        return $this->hasMany(Certification::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
