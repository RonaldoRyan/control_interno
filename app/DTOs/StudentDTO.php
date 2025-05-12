<?php
namespace App\DTOs;

class StudentDTO
{
    public function __construct(
        public ?int    $idStudent               = null,
        public string  $name,
        public string  $birth_date,
        public int     $age,
        public string  $address,
        public string  $benefits,
        public ?string  $dad_name,
        public ?string  $idNumber_dad,
        public ?string  $dad_phone,
        public string  $mom_name,
        public string  $idNumber_mom,
        public string  $mom_phone,
        public string  $emergency_contact,
        public ?int    $emergency_Idcontact   = null,
        public string  $emergency_contact_phone,
        public string  $vaccine_information,
        public ?string $allergies_or_conditions = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['idStudent'] ?? null,
            $data['name'],
            $data['birth_date'],
            (int) $data['age'],
            $data['address'],
            $data['benefits'],
            $data['dad_name'],
            $data['idNumber_dad'],
            $data['dad_phone'],
            $data['mom_name'],
            $data['idNumber_mom'],
            $data['mom_phone'],
            $data['emergency_contact']  ?? null,
            $data['emergency_Idcontact'],
            $data['emergency_contact_phone'],
            $data['vaccine_information'],
            $data['allergies_or_conditions']  ?? null,
        );
    }
}
