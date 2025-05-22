<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfessorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                      => $this->id,
            'name'                    => $this->name,
            'idNumber'                => $this->idNumber,
            'address'                 => $this->address,
            'phone'                   => $this->phone,
            'email'                   => $this->email,
            'allergies_or_conditions' => $this->allergies_or_conditions,
        ];
    }
}
