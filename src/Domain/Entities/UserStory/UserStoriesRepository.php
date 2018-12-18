<?php

namespace Cartago\Domain\Entities\UserStory;

interface UserStoriesRepository
{
    public function create(UserStory $userStory):void;

    public function save(UserStory $userStory):void;

    public function byId(string $id):?UserStory;
}