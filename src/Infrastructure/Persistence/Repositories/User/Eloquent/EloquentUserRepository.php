<?php

namespace Cartago\Infrastructure\Persistence\Repositories\User\Eloquent;

use Cartago\Domain\Entities\User\User;
use Cartago\Domain\Entities\User\UserId;
use Cartago\Domain\Entities\User\UserRepository;

class EloquentUserRepository implements UserRepository
{

    public function byIdOrFail(UserId $id): User
    {
        // TODO: Implement byIdOrFail() method.
    }

    public function create(User $newUser)
    {
        // TODO: Implement create() method.
    }
}