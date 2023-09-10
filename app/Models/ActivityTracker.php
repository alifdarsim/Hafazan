<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
/**
 * Post
 *
 * @mixin Builder
 */
class ActivityTracker extends Model
{
    protected $connection = 'mysql';
    protected $table = 'activity';

    protected $fillable = [
        'user_id',
        'activity',
        'verse',
        'note'
    ];
}