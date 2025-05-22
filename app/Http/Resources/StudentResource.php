<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'age' => $this->age,
            'address' => $this->address,
            'benefits' => $this->benefits,
            'dad_name' => $this->dad_name,
            'idNumber_dad' => $this->idNumber_dad,
            'dad_phone' => $this->dad_phone,
            'mom_name' => $this->mom_name,
            'idNumber_mom' => $this->idNumber_mom,
            'mom_phone' => $this->mom_phone,
            'emergency_contact' => $this->emergency_contact,
            'emergency_Idcontact' => $this->emergency_Idcontact,
            'emergency_contact_phone' => $this->emergency_contact_phone,
            'vaccine_information' => $this->vaccine_information,
            'allergies_or_conditions' => $this->allergies_or_conditions,
        ];
    }
}
