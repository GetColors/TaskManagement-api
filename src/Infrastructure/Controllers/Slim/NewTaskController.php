<?php

namespace Cartago\Infrastructure\Controllers\Slim;

use Cartago\Application\Services\CreateTask\CreateTaskRequest;
use Cartago\Application\Services\CreateTask\CreateTaskService;
use Cartago\Infrastructure\Persistence\Repositories\UserStories\Eloquent\TaskUUIDCollisionException;
use Slim\Http\Request;
use Slim\Http\Response;
use Cartago\Infrastructure\Uuid\UuidGenerator;
use Cartago\Infrastructure\Controllers\Slim\Base\Controller;
use Cartago\Infrastructure\Persistence\Repositories\UserStories\Eloquent\EloquentUserStoriesRepository;

class NewTaskController extends Controller
{
    public function create(Request $request, Response $response, $args)
    {
        $parameters = $request->getParsedBody();


        $createTaskRequest = new CreateTaskRequest(
            UuidGenerator::generate(), $parameters['name'], $parameters['description'], $args['userStoryId']
        );
        
        $createTaskService = new CreateTaskService(
            new EloquentUserStoriesRepository()
        );
        try{

            $createTaskService->execute($createTaskRequest);

            return $response->withJson(['message' => 'Task created correctly.'], 201);
        }catch (TaskUUIDCollisionException $exception){
            return $response->withJson(['errors' => 'The provided id is already in use.'], 400);
        }
    }
}