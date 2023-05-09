<?php

namespace Domain\Users\Actions;

use Domain\Users\DTO\UserCreateDTO;
use Domain\Users\DTO\UserCreateFromThirdPartyDTO;
use Domain\Users\DTO\UserDTO;
use Domain\Users\Models\User;

class GetUserFromThirdPartyAction
{

    public function __construct(private readonly CreateUserAction $createuserAction) {
    }

    public function execute(UserCreateFromThirdPartyDTO $userData): UserDTO
    {
        $data = $userData->toArray();
        $user = User::where('email', $userData->email)->first();
        if(!$user) {
            $password = substr(md5(mt_rand()), 0, 8);
            $data['password'] = $password;
            return $this->createuserAction->execute(UserCreateDTO::from($data));
        }
        return UserDTO::from($user);
    }
}
