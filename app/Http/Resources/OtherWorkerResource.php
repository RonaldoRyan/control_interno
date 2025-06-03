<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OtherWorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idOtherWorker' => $this->idOtherWorker,
            'name'          => $this->name,
            'idNumber'      => $this->idNumber,
            'address'       => $this->address,
            'phone'         => $this->phone,
            'email'         => $this->email,
            'section'       => $this->section,
            'conditions'    => $this->conditions,
        ];
    }
}
