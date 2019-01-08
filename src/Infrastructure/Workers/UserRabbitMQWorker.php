<?php

namespace Cartago\Infrastructure\Workers;

use Cartago\Application\UseCases\CreateUser\CreateUserRequest;
use Cartago\Application\UseCases\CreateUser\CreateUserService;
use Cartago\Infrastructure\Persistence\Repositories\User\Eloquent\EloquentUserRepository;
use Cartago\Infrastructure\Queue\RabbitMQ\RabbitMQConnection;

class UserRabbitMQWorker
{
    public function consume()
    {
        $connection = new RabbitMQConnection();
        $channel = $connection->channel();

        $channel->queue_declare('registeredUsers', false, false, false, false);

        $callback = function ($msg) {

            $request = json_decode($msg->body, true);

            $createUserRequest = new CreateUserRequest(
                $request['userId'],
                $request['username'],
                $request['email']
            );

            $createUserService = new CreateUserService(
                new EloquentUserRepository()
            );

            $createUserService->execute($createUserRequest);


        };

        $channel->basic_consume(
            'registeredUsers',
            '',
            false,
            true,
            false,
            false,
            $callback
        );

        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
}