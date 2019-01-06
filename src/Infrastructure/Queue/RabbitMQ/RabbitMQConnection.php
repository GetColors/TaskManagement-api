<?php

namespace Cartago\Infrastructure\Queue\RabbitMQ;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQConnection
{
    private $connection;

    public function __construct()
    {
        try{
            $this->connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        }catch (\Exception $exception)
        {
            print_r(json_encode([
                'error' => [
                    'code' => $exception->getCode(),
                    'message' => $exception->getMessage()
                ]
            ]));
            exit(400);
        }

    }

    public function channel()
    {
        return $this->connection->channel();
    }

    public function close()
    {
        $this->connection->close();
    }
}