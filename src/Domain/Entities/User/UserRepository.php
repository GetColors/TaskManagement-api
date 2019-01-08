<?php

namespace Cartago\Domain\Entities\User;

interface UserRepository
{
    public function byIdOrFail(UserId $id):User;

    public function create(User $newUser);
}