<?php

namespace Cartago\Infrastructure\Controllers\Slim;

use Cartago\Infrastructure\Controllers\Slim\Base\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexApiController extends Controller
{
    public function index(Request $request, Response $response)
    {
        return $response->withJson(['Service working fine!'], 200);
    }
}