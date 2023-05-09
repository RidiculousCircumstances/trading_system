<?php

namespace Domain\Users\Services;

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

class OAuthService
{
    private function getProvider() {
        return Route::getCurrentRoute()->getName();
    }

    public function redirect() {
        $provider = $this->getProvider();
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function getUser() {
        $provider = $this->getProvider();
        return Socialite::driver($provider)->stateless()->user();
    }

}
