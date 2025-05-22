<?php

namespace App\DTOs;


class RegisterUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $password_confirmation,
    ) {
    }



    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
            $data['password_confirmation'],
        );
    }
}
// Compare this snippet from app/Http/Controllers/AuthController.php:
