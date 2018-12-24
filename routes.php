<?php

$app->get('/', 'IndexApiController:index');

$app->put('/user-stories/{userStoryId}/tasks', 'NewTaskController:create');

$app->post('/user-stories', 'NewUserStoryController:create');


