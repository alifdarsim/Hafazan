<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Post
 *
 * @mixin Builder
 */
class Bookmark extends Model
{
    protected $connection = 'mysql';
    protected $table = 'bookmark';
    protected $hidden = ['user_id', 'created_at', 'updated_at'];
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}