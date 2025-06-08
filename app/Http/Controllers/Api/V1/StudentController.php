<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StudentRequest\StoreStudentRequest;
use App\Http\Requests\StudentRequest\UpdateStudentRequest;
use App\DTOs\StudentDTO;
use App\Models\Student;
use App\Services\StudentServices\StudentService;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }



    public function index(): JsonResponse
    {
        $this->authorize('viewAny', Student::class);

        $students = $this->studentService->getAll();
        return response()->json([
            'students' => StudentResource::collection($students),
        ]);
    }



    public function store(StoreStudentRequest $request): JsonResponse
    {

        $this->authorize('create', Student::class);

        $dto = StudentDTO::fromArray($request->validated());
        $student = $this->studentService->createStudent($dto);

        return response()->json([
            'student' => new StudentResource($student),
        ], 201);
    }

    public function show(int $id): JsonResponse
    {

        $student = $this->studentService->findById($id);
        return response()->json([
            'student' => new StudentResource($student),
        ]);
    }


    public function update(UpdateStudentRequest $request, int $id): JsonResponse
    {
        $student = Student::findOrFail($id);
        $this->authorize('update', $student);

        $dto = StudentDTO::fromArray($request->validated());

        $student = $this->studentService->updateStudent($id, $dto);

        return response()->json([
            'student' => new StudentResource($student),
        ], 200);
    }


    public function destroy(int $id): JsonResponse
    {
        $student = Student::findOrFail($id);
        $this->authorize('delete', $student);

        $this->studentService->deleteStudent($id);
        return response()->json([
            'message' => 'Student deleted successfully',
        ], 200);
    }




}
