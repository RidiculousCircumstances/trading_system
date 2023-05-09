<?php

namespace Domain\Users\DTO;

use Domain\Users\Models\User;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Normalizers\ArrayableNormalizer;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Normalizers\JsonNormalizer;
use Spatie\LaravelData\Normalizers\ModelNormalizer;
use Spatie\LaravelData\Normalizers\ObjectNormalizer;
use Support\Normalizers\ProviderNormalizer;

class UserCreateFromThirdPartyDTO extends Data
{
    public function __construct(

        #[StringType]
        public string $name,

        #[Email]
        #[Unique(User::class, 'email')]
        public string $email,

        #[StringType]
        public ?string $avatar,

        #[StringType]
        public ?string $nickname
    ) {}

    public static function normalizers(): array {
        return [
            ModelNormalizer::class,
            ArrayableNormalizer::class,
            ObjectNormalizer::class,
            ArrayNormalizer::class,
            JsonNormalizer::class,
            ProviderNormalizer::class,
        ];
    }
}
