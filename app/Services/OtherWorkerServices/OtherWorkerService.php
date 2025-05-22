<?php

namespace App\Services\OtherWorkerServices;
use App\DTOs\OtherWorkerDTO;
use App\Models\Other_worker;



class OtherWorkerService
{


           public function getAll()
    {
        return Other_worker::all();
    }


    public function findById(int $id): Other_worker
    {
        // Find the student by ID
        return Other_worker::findOrFail($id);
    }

    // This method creates a new other worker record in the database using the provided DTO.
    public function createOtherWorker(OtherWorkerDTO $dto): Other_worker
    {
        return Other_worker::create([
            'id'                        => $dto->idOtherWorker,
            'name'                      => $dto->name,
            'idNumber'                  => $dto->idNumber,
            'address'                   => $dto->address,
            'phone'                     => $dto->phone,
            'email'                     => $dto->email,
            'section'                   => $dto->section,
            'conditions'                => $dto->conditions,
        ]);
    }


    public function updateOtherWorker(int $id, OtherWorkerDTO $dto): Other_worker
    {
        // Find the other worker by ID
        $otherWorker = Other_worker::findOrFail($id);
        $otherWorker->update([
            'name'                      => $dto->name,
            'idNumber'                  => $dto->idNumber,
            'address'                   => $dto->address,
            'phone'                     => $dto->phone,
            'email'                     => $dto->email,
            'section'                   => $dto->section,
            'conditions'                => $dto->conditions,
        ]);

        return $otherWorker;
    }


    // This method deletes an other worker record from the database by its ID.
    public function deleteOtherWorker(int $id): void
    {
        // Find the other worker by ID and delete it
        Other_worker::findOrFail($id)->delete();
    }
}

