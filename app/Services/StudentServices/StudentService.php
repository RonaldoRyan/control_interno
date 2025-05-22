<?php
namespace App\Services\StudentServices;

use App\DTOs\StudentDTO;
use App\Models\Student;

class StudentService
{






    /**
     * Retrieve all students from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection List of all students.
     */
           public function getAll()
    {
        return Student::all();
    }


    /**
     * Retrieve a student by their ID.
     *
     * @param int $id The ID of the student to retrieve.
     * @return \App\Models\Student The student instance.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If no student is found with the given ID.
     */
     public function findById(int $id): Student
    {
        // Find the student by ID
        return Student::findOrFail($id);
    }






    public function createStudent(StudentDTO $dto): Student
    {
        return Student::create([
            'id'                      => $dto->idStudent,
            'name'                    => $dto->name,
            'birth_date'              => $dto->birth_date,
            'age'                     => $dto->age,
            'address'                 => $dto->address,
            'benefits'                => $dto->benefits,
            'dad_name'                => $dto->dad_name,
            'idNumber_dad'            => $dto->idNumber_dad,
            'dad_phone'               => $dto->dad_phone,
            'mom_name'                => $dto->mom_name,
            'idNumber_mom'            => $dto->idNumber_mom,
            'mom_phone'               => $dto->mom_phone,
            'emergency_contact'       => $dto->emergency_contact,
            'emergency_Idcontact'     => $dto->emergency_Idcontact,
            'emergency_contact_phone' => $dto->emergency_contact_phone,
            'vaccine_information'     => $dto->vaccine_information,
            'allergies_or_conditions' => $dto->allergies_or_conditions,
        ]);
    }




    public function updateStudent(int $id, StudentDTO $dto): Student
    {
        // Find the student by ID
             $student = Student::findOrfail($id);
             $student->update([

            'name'                    => $dto->name,
            'birth_date'              => $dto->birth_date,
            'age'                     => $dto->age,
            'address'                 => $dto->address,
            'benefits'                => $dto->benefits,
            'dad_name'                => $dto->dad_name,
            'idNumber_dad'            => $dto->idNumber_dad,
            'dad_phone'               => $dto->dad_phone,
            'mom_name'                => $dto->mom_name,
            'idNumber_mom'            => $dto->idNumber_mom,
            'mom_phone'               => $dto->mom_phone,
            'emergency_contact'       => $dto->emergency_contact,
            'emergency_IdContact'     => $dto->emergency_Idcontact,
            'emergency_contact_phone' => $dto->emergency_contact_phone,
            'vaccine_information'     => $dto->vaccine_information,
            'allergies_or_conditions' => $dto->allergies_or_conditions,
        ]);

        return $student;
    }

    public function deleteStudent(int $id): void
    {

        // Find the student by ID and delete it
        Student::findOrFail($id)->delete();
    }



}
