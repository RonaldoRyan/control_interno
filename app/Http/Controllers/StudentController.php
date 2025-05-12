<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\DTOs\StudentDTO;
use App\Services\StudentService;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;


class StudentController extends Controller


{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }


    // create a new student
    public function saveStudent(StoreStudentRequest $request)
    {

        $dto = StudentDTO::fromArray($request->validated());

         (new StudentService())->createStudent($dto);


        return redirect()->back()->with('success', 'Student created successfully.');
    }

    // Update to students

    public function updateStudent(UpdateStudentRequest $request, $id){


        $dto = StudentDTO::fromArray($request->validated());


        $this->studentService->updateStudent($id, $dto);

        return redirect()->back()->with('success', 'Student Updated.');


    // eliminate student
}
     public function destroy_students(int $id)
    {

        $this->studentService->deleteStudent($id);

    return redirect()
        ->back()
        ->with('success', 'Student Eliminated.');
}

}
