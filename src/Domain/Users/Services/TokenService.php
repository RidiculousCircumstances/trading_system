<?php

namespace Domain\Users\Services;

use Domain\Users\DTO\UserDTO;
use Domain\Users\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class TokenService
{
    public function getToken(UserDTO $userData) {
        $user = User::where('email', $userData->email)->first();
        return JWTAuth::fromSubject($user);
    }
}
