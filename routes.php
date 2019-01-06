<?php

use PhpAmqpLib\Message\AMQPMessage;

$app->get('/', 'IndexApiController:index');

$app->put('/user-stories/{userStoryId}/tasks', 'NewTaskController:create');

$app->post('/user-stories', 'NewUserStoryController:create');

$app->get('/test',  function () {
    $connection = new \Cartago\Infrastructure\Queue\RabbitMQ\RabbitMQConnection();
    $channel = $connection->channel();
    $channel->queue_declare('hello', false, false, false, false);
    $msg = new AMQPMessage('mensaje de prueba desde php');
    $channel->basic_publish($msg, '', 'hello');
    $channel->close();
    $connection->close();
});

