<?php

namespace Domain\Users\Actions;

use Domain\Users\DTO\UserCreateDTO;
use Domain\Users\DTO\UserDTO;
use Domain\Users\Models\User;

class CreateUserAction
{
    public function execute(UserCreateDTO $userData): UserDTO
    {
        return UserDTO::from(User::create($userData->toArray()));
    }
}
