<?php

namespace Cartago\Domain\Entities\UserStory;

interface UserStoriesRepository
{
    public function save(UserStory $userStory):void;
}