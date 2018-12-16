<?php

namespace Cartago\Infrastructure\Persistence\Entities\UserStories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentUserStory extends Model
{
    protected $table = 'user_stories';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'name'
    ];
}