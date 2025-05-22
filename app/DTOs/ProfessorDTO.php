<?php
namespace App\DTOs;

class ProfessorDTO
{

    public function __construct(
        public ?int    $idProfessor = null,
        public string  $name,
        public int     $idNumber,
        public string  $address,
        public string  $phone,
        public string  $email,
        public ?string  $allergies_or_conditions = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(

            $data['id'] ?? null,
            $data['name'],
            (int) $data['idNumber'],
            $data['address'],
            $data['phone'],
            $data['email'],
            $data['allergies_or_conditions'] ?? null,
    );
    }
}
