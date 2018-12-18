<?php

namespace Cartago\Infrastructure\Persistence\Repositories\UserStories\Eloquent;

use Cartago\Domain\Entities\Task\Task;
use Illuminate\Database\QueryException;
use Illuminate\Database\Capsule\Manager as DB;
use Cartago\Domain\Entities\UserStory\UserStory;
use Cartago\Domain\Entities\UserStory\UserStoriesRepository;
use Cartago\Infrastructure\Persistence\Entities\UserStories\Eloquent\EloquentTask;
use Cartago\Infrastructure\Persistence\Entities\UserStories\Eloquent\EloquentUserStory;

class EloquentUserStoriesRepository implements UserStoriesRepository
{

    public function create(UserStory $userStory): void
    {

        $eloquentUserStory = new EloquentUserStory();
        $eloquentUserStory->id = $userStory->id();
        $eloquentUserStory->name = $userStory->name();

        try{

            EloquentUserStory::create(
                [
                    'id' => $userStory->id(),
                    'name' => $userStory->name()
                ]
            );

        }catch(QueryException $exception) {
            DB::rollBack();
            $errorCode = $exception->errorInfo['1'];
            if ($errorCode === 1062){
                throw new UserStoryUUIDCollisionException();
            }
        }
    }

    public function byId(string $id): ?UserStory
    {
        $eloquentUserStory = EloquentUserStory::find($id);

        if ($eloquentUserStory === null){
            throw new UserStoryNotFoundException();
        }

        $userStory = new UserStory(
            $eloquentUserStory->id,
            $eloquentUserStory->name
        );

        foreach ($eloquentUserStory->tasks() as $task){
            $userStory->addTask(new Task(
                $task->id,
                $task->name,
                $task->description,
                $task->user_story_id
            ));
        }

        return $userStory;
    }

    public function save(UserStory $userStory): void
    {

        DB::beginTransaction();

        $eloquentUserStory = EloquentUserStory::find($userStory->id());

        $eloquentUserStory->name = $userStory->name();

        try{

            $eloquentUserStory->save();
        }catch(QueryException $exception) {

            $errorCode = $exception->errorInfo['1'];

            if ($errorCode === 1062){
                throw new UserStoryUUIDCollisionException();
            }
        }

        foreach ($userStory->tasks() as $task){

            $eloquentTask = EloquentTask::find($task->id());

            if ($eloquentTask === null){

                try{
                    EloquentTask::create([
                        'id' => $task->id(),
                        'name' => $task->name(),
                        'description' => $task->description(),
                        'user_story_id' => $task->userStoryId()
                    ]);

                }catch (QueryException $exception){

                    DB::rollBack();

                    $errorCode = $exception->errorInfo['1'];

                    if ($errorCode === 1062){
                        throw new TaskUUIDCollisionException();
                    }
                }

            }else{

                $eloquentTask->name = $task->name();
                $eloquentTask->description = $task->description();
                $eloquentTask->user_story_id = $task->userStoryId();

                $eloquentTask->save();
            }
        }
        DB::commit();
    }
}