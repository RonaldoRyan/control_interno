<?php
namespace App\DTOs;
use Laravel\Sanctum\HasApiTokens;


class LoginUserDTO

{


    public function __construct(
        public string $email,
        public string $password,
    ) {
    }


    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['password'],
        );
    }
}
