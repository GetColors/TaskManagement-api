<?php

namespace Cartago\Infrastructure\Persistence\Repositories\UserStories\Eloquent;

use Cartago\Domain\Entities\UserStory\UserStory;
use Cartago\Domain\Entities\UserStory\UserStoriesRepository;
use Cartago\Infrastructure\Persistence\Exceptions\UuidCollisionException;
use Cartago\Infrastructure\Persistence\Entities\UserStories\Eloquent\EloquentUserStory;
use Illuminate\Database\QueryException;

class EloquentUserStoriesRepository implements UserStoriesRepository
{

    public function save(UserStory $userStory): void
    {

        $eloquentUserStory = new EloquentUserStory();
        $eloquentUserStory->uuid = $userStory->uuid();
        $eloquentUserStory->name = $userStory->name();

        try{
            $eloquentUserStory->save();
        }catch(QueryException $exception)
        {
            $errorCode = $exception->errorInfo['1'];
            if ($errorCode === 1062){
                throw new UuidCollisionException();
            }
        }
    }
}