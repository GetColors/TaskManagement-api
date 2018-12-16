<?php

use \Cartago\Infrastructure\Controllers\Slim\NewTaskController;
use \Cartago\Infrastructure\Controllers\Slim\IndexApiController;
use \Cartago\Infrastructure\Controllers\Slim\NewUserStoryController;

$container['IndexApiController'] = function ($container){
    return new IndexApiController($container);
};

$container['NewTaskController'] = function ($container){
    return new NewTaskController($container);
};

$container['NewUserStoryController'] = function ($container){
    return new NewUserStoryController($container);
};