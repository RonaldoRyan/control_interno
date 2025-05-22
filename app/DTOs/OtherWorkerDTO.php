<?php

namespace App\DTOs;


class  OtherWorkerDTO
{
    public function __construct(
        public ?int    $idOtherWorker = null,
        public string  $name,
        public int     $idNumber,
        public string  $address,
        public string  $phone,
        public string  $email,
        public string  $section,
        public string  $conditions,
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
            $data['section'],
            $data['conditions'] ?? null,
        );
    }
}
