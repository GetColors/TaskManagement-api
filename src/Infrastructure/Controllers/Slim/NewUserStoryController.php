<?php

namespace Cartago\Infrastructure\Controllers\Slim;

use Slim\Http\Request;
use Slim\Http\Response;
use Cartago\Infrastructure\Uuid\UuidGenerator;
use Cartago\Infrastructure\Controllers\Slim\Base\Controller;
use Cartago\Application\Services\CreateUserStory\CreateUserStoryRequest;
use Cartago\Application\Services\CreateUserStory\CreateUserStoryService;
use Cartago\Infrastructure\Persistence\Exceptions\UuidCollisionException;
use Cartago\Infrastructure\Persistence\Repositories\UserStories\Eloquent\EloquentUserStoriesRepository;

class NewUserStoryController extends Controller
{
    public function create(Request $request, Response $response)
    {
        $parameters = $request->getParsedBody();

        $createUserStoryRequest = new CreateUserStoryRequest( UuidGenerator::generate(),$parameters['name']);

        $createUserStoryService = new CreateUserStoryService(new EloquentUserStoriesRepository());

        try{
            $createUserStoryService->execute($createUserStoryRequest);

            return $response->withJson(['message' => 'User story was successfully created.'], 200);

        }catch (UuidCollisionException $exception){

            $this->create($request,$response);
        }
    }
}