<?php

namespace Cartago\Infrastructure\Controllers\Slim;

use Slim\Http\Request;
use Slim\Http\Response;
use Cartago\Infrastructure\Controllers\Slim\Base\Controller;

class NewTaskController extends Controller
{
    public function create(Request $request, Response $response)
    {
        echo 'creating';
    }
}