<?php

namespace Cartago\Application\UseCases\CreateUser;

use Cartago\Domain\Entities\User\User;
use Cartago\Domain\Entities\User\UserRepository;

class CreateUserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserRequest $request):void
    {
        $newUser = new User(
            $request->userId(),
            $request->username(),
            $request->email()
        );

        $this->userRepository->create($newUser);
    }
}