<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    protected $table = 'images';

    // One-to-Many Relation

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);

    }
    public function likes() : HasMany
    {
        return $this->hasMany(Like::class);

    }

    // Many-to-One Relation

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
