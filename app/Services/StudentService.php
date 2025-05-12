<?php
namespace App\Services;

use App\DTOs\StudentDTO;
use App\Models\Student;

class StudentService
{
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
        $student = Student::findOrFail($id);
        $student->delete();
    }
}
