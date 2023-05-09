<?php

namespace Support\Normalizers;

use Laravel\Socialite\Contracts\User;
use Spatie\LaravelData\Normalizers\Normalizer;

class ProviderNormalizer implements Normalizer
{
    public function normalize(mixed $value): ?array
    {
        if (! $value instanceof User) {
            return null;
        }

        return [
            'email' => $value->getEmail(),
            'name' => $value->getName(),
            'avatar' => $value->getAvatar(),
            'nickname' => $value->getNickname()
        ];
    }
}
