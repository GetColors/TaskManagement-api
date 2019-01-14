<?php

namespace Cartago\Application\UseCases\RegisterUser;

use Cartago\Domain\Entities\User\User;
use Cartago\Domain\Entities\User\UserRepository;

final class RegisterUserUseCase
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(RegisterUserRequest $request)
    {
        $newUser = new User(
            $request->id(),
            $request->username(),
            $request->email()
        );
        $this->userRepository->create($newUser);
    }
}