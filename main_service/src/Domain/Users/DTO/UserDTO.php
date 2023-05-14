<?php

namespace Domain\Users\DTO;

use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public function __construct(

        public string $name,

        public string $email,

        public string $created_at,

        public ?string $avatar,

        public ?string $nickname
    ) {}
}
