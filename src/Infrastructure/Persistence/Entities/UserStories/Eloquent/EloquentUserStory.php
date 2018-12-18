<?php

namespace Cartago\Infrastructure\Persistence\Entities\UserStories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentUserStory extends Model
{
    protected $table = 'user_stories';

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];

    public function tasks()
    {
        return $this->hasMany(EloquentTask::class);
    }
}