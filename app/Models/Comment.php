<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['post_id', 'content'];

    /* Relationships */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
