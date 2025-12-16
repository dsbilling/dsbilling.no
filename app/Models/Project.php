<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Kilobyteno\LaravelUserGuestLike\Traits\HasUserGuestLike;
use Spatie\Tags\HasTags;

class Project extends Model implements Viewable
{
    use HasFactory;
    use HasTags;
    use HasUserGuestLike;
    use InteractsWithViews;
    use SoftDeletes;

    public static function boot(): void
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
            $model->slug = Str::slug($model->title);
        });

        self::updating(function ($model) {
            if (! $model->uuid) {
                $model->uuid = Str::uuid()->toString();
            }
            $model->slug = Str::slug($model->title);
        });
    }

    protected $fillable = [
        'title',
        'slug',
        'content',
        'repository',
        'website',
        'logo_url',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected $withCount = [
        'likes',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '>=', 1);
    }
}
