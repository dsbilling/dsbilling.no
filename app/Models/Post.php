<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Post extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    use SoftDeletes;
    use HasTags;

    protected $removeViewsOnDelete = true;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });

        self::updating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'draft',
        'published_at',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $withCount = [
        'likes',
    ];

    /**
     * Get the user that made this post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function isLiked()
    {
        if (auth()->user()) {
            return auth()->user()->likes()->forPost($this)->count();
        }

        if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            return $this->likes()->forIp($ip)->forUserAgent($userAgent)->count();
        }

        return false;
    }

    public function removeLike()
    {
        if (auth()->user()) {
            return auth()->user()->likes()->forPost($this)->delete();
        }

        if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            return $this->likes()->forIp($ip)->forUserAgent($userAgent)->delete();
        }

        return false;
    }

    public function scopeIsPublished($query)
    {
        return $query->where('draft', false)->where('published_at', '<=', now());
    }
}
