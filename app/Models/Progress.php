<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin Builder
 */
class Progress extends Model
{
    protected $connection = 'mysql';
    protected $table = 'progress';
    protected $guarded = [];
    protected $appends = ['verse_key'];

    protected $casts = [
        'created_at' => 'datetime:h:i A, d/m/Y',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getVerseKeyAttribute(): string
    {
        return "{$this->surah}:{$this->verse}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
