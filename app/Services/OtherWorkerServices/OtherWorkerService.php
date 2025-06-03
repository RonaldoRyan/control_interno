<?php

namespace App\Services\OtherWorkerServices;
use App\DTOs\OtherWorkerDTO;
use App\Models\OtherWorker;



class OtherWorkerService
{


           public function getAll()
    {
        return OtherWorker::all();
    }


    public function findById(int $id): OtherWorker
    {
        // Find the student by ID
        return OtherWorker::findOrFail($id);
    }

    // This method creates a new other worker record in the database using the provided DTO.
    public function createOtherWorker(OtherWorkerDTO $dto): OtherWorker
    {
        return OtherWorker::create([
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


    public function updateOtherWorker(int $id, OtherWorkerDTO $dto): OtherWorker
    {
        // Find the other worker by ID
        $otherWorker = OtherWorker::findOrFail($id);
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
        OtherWorker::findOrFail($id)->delete();
    }
}

