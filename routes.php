<?php

$app->get('/', 'IndexApiController:index');

$app->post('/tasks/create', 'NewTaskController:create');

$app->post('/user-stories/create', 'NewUserStoryController:create');

