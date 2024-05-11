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
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Many-to-One Relation

    public function hasLikeFrom($user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);

    }
}
