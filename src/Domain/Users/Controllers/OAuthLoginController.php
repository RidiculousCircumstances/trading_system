<?php

namespace Domain\Users\Controllers;

use Domain\Users\Actions\CreateUserAction;
use Domain\Users\Actions\GetUserFromThirdPartyAction;
use Domain\Users\DTO\UserCreateDTO;
use Domain\Users\DTO\UserCreateFromThirdPartyDTO;
use Domain\Users\Services\OAuthService;
use Domain\Users\Services\TokenService;
use Support\Controllers\Controller;

class OAuthLoginController extends Controller
{

    public function __construct(
        private readonly OAuthService $oauthService,
        private readonly TokenService $tokenService,
        private readonly GetUserFromThirdPartyAction $createUserAction
    ) {
    }

    public function redirectToProvider() {
        return $this->oauthService->redirect();
    }

    public function handleProviderResponse() {
        $incomingUserData = $this->oauthService->getUser();
        $userData = $this->createUserAction->execute(UserCreateFromThirdPartyDTO::from($incomingUserData));
        return $this->tokenService->getTokens($userData);
    }
}
