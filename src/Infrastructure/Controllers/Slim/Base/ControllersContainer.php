<?php

use \Cartago\Infrastructure\Controllers\Slim\IndexApiController;


$container['IndexApiController'] = function ($container){
    return new IndexApiController($container);
};
