<?php

namespace App\Services\ProfessorServices;
use App\Models\Professor;
use App\DTOs\ProfessorDTO;

class ProfessorService
{

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        // This method retrieves all professors from the database.
        return Professor::all();
    }
    public function findById(int $id): Professor
    {
        // This method retrieves a professor by its ID from the database.
        return Professor::findOrFail($id);
    }



    // This method creates a new professor record in the database using the provided DTO.
    public function createProfessor(ProfessorDTO $dto): Professor



    {
        return Professor::create([
            'id'                        => $dto->idProfessor,
            'name'                      => $dto->name,
            'idNumber'                  => $dto->idNumber,
            'address'                   => $dto->address,
            'phone'                     => $dto->phone,
            'email'                     => $dto->email,
            'allergies_or_conditions'   => $dto->allergies_or_conditions,
        ]);

    }


    public function updateProfessor(int $id, ProfessorDTO $dto): Professor
    {
        // Find the professor by ID

        $professor = Professor::findOrFail($id);
        $professor->update([

            'name'                      => $dto->name,
            'idNumber'                  => $dto->idNumber,
            'address'                   => $dto->address,
            'phone'                     => $dto->phone,
            'email'                     => $dto->email,
            'allergies_or_conditions'   => $dto->allergies_or_conditions,
        ]);

        return $professor;
    }



    // This method deletes a professor record from the database by its ID.
    public function deleteProfessor(int $id): void
    {
        // Find the professor by ID and delete it
        Professor::findOrFail($id)->delete();
    }
}

