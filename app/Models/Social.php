<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'icon',
        'link',
    ];
}
