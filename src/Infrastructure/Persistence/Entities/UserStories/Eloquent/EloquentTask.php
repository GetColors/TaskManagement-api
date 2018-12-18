<?php

namespace Cartago\Infrastructure\Persistence\Entities\UserStories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentTask extends Model
{
    protected $table = "tasks";

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'user_story_id'
    ];

    public function userStory()
    {
        return $this->belongsTo(EloquentUserStory::class);
    }
}