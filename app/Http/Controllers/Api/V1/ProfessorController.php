<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ProfessorRequest\StoreProfessorRequest;
use App\Http\Requests\ProfessorRequest\UpdateProfessorRequest;
use App\Models\Professor;
use App\DTOs\ProfessorDTO;
use App\Services\ProfessorServices\ProfessorService;
use App\Http\Resources\ProfessorResource;

class ProfessorController extends Controller
{
    protected ProfessorService $professorService;

    public function __construct(ProfessorService $professorService)
    {
        $this->professorService = $professorService;
    }


     public function index(): JsonResponse
    {
        $this->authorize('viewAny', Professor::class);

        $professors = $this->professorService->getAll();
        return response()->json([
            'professors' => ProfessorResource::collection($professors),
        ]);

       }

        public function store(StoreProfessorRequest $request): JsonResponse
    {
        $this->authorize('create', Professor::class);

        $dto = ProfessorDTO::fromArray($request->validated());
        $professor = $this->professorService->createProfessor($dto);

        return response()->json([
            'professor' => new ProfessorResource($professor),
        ]);
    }
    public function show(int $id): JsonResponse
    {
        $professor = $this->professorService->findById($id);
        return response()->json([
            'professor' => new ProfessorResource($professor),
        ]);
    }
    public function update(UpdateProfessorRequest $request, int $id): JsonResponse
    {
        $professor = Professor::findOrFail($id);
        $this->authorize('update', $professor);

        $dto = ProfessorDTO::fromArray($request->validated());
        $professor = $this->professorService->updateProfessor($id, $dto);

        return response()->json([
            'professor' => new ProfessorResource($professor),
        ]);
    }
    public function destroy(int $id): JsonResponse
    {
        $professor = Professor::findOrFail($id);
        $this->authorize('delete', $professor);

        $this->professorService->deleteProfessor($id);
        return response()->json([
            'message' => 'Professor deleted successfully',
        ]);
    }
}

