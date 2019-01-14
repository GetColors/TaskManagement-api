<?php

use Cartago\Domain\Entities\User\User;
use Cartago\Domain\Entities\User\UserId;
use Cartago\Domain\Entities\User\UserRepository;
use Cartago\Domain\Entities\User\EmailAlreadyExistException;
use Cartago\Domain\Entities\User\UsernameAlreadyExistException;
use Cartago\Application\UseCases\RegisterUser\RegisterUserRequest;
use Cartago\Application\UseCases\RegisterUser\RegisterUserUseCase;

class RegisterUserUseCaseTest extends \PHPUnit\Framework\TestCase
{
    /**
     *@test
     * @expectedException \Cartago\Domain\Entities\User\UsernameAlreadyExistException
     */
    public function shouldFailWhenUsernameIsAlreadyInUse()
    {
        $request = new RegisterUserRequest(
            'aaa',
            'username1',
            'test@email.com'
        );

        $service = new RegisterUserUseCase(
            new UserRepositoryStub()
        );

        $service->execute($request);
    }

    /**
     *@test
     * @expectedException \Cartago\Domain\Entities\User\EmailAlreadyExistException
     */
    public function shouldFailWhenEmailIsAlreadyInUse()
    {
        $request = new RegisterUserRequest(
            'aaa',
            'username',
            'test1@email.com'
        );

        $service = new RegisterUserUseCase(
            new UserRepositoryStub()
        );

        $service->execute($request);
    }
}

class UserRepositoryStub implements UserRepository
{

    public function byIdOrFail(UserId $id): \Cartago\Domain\Entities\User\User
    {
        // TODO: Implement byIdOrFail() method.
    }

    public function create(User $newUser): void
    {
        $usernameInUse = "username1";
        $emailInUse = "test1@email.com";

        if ($usernameInUse === $newUser->username()->get()){
            throw new UsernameAlreadyExistException("Username is already in use.");
        }

        if ($emailInUse === $newUser->email()->get()){
            throw new EmailAlreadyExistException("Email is already in use.");
        }

    }
}