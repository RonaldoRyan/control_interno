<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\OtherWorkerServices\OtherWorkerService;
use Illuminate\Http\Request;
use Illuminate\Support\Js;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\OtherWorkerRequest\StoreOtherWorkerRequest;
use App\Http\Requests\OtherWorkerRequest\UpdateOtherWorkerRequest;
use App\DTOs\OtherWorkerDTO;
use App\Http\Resources\OtherWorkerResource;
use App\Models\OtherWorker;

class OtherWorkerController extends Controller
{
    protected OtherWorkerService $otherWorkerService;

    public function __construct(OtherWorkerService $otherWorkerService)
    {
        $this->otherWorkerService = $otherWorkerService;
    }


     public function index(): JsonResponse
    {
        $otherWorkers = $this->otherWorkerService->getAll();
        return response()->json([
            'otherWorkers' => OtherWorkerResource::collection($otherWorkers),
        ]);

   }

    public function store(StoreOtherWorkerRequest $request): JsonResponse
    {
        $dto = OtherWorkerDTO::fromArray($request->validated());
        $otherWorker = $this->otherWorkerService->createOtherWorker($dto);

        return response()->json([
            'otherWorker' => new OtherWorkerResource($otherWorker),
        ]);
    }
    public function show(int $id): JsonResponse
    {
        $otherWorker = $this->otherWorkerService->findById($id);
        return response()->json([
            'otherWorker' => new OtherWorkerResource($otherWorker),
        ]);
    }
    public function update(UpdateOtherWorkerRequest $request, int $id): JsonResponse
    {
        $dto = OtherWorkerDTO::fromArray($request->validated());
        $otherWorker = $this->otherWorkerService->updateOtherWorker($id, $dto);

        return response()->json([
            'otherWorker' => new OtherWorkerResource($otherWorker),
        ]);
    }
    public function destroy(int $id): JsonResponse
    {
        $this->otherWorkerService->deleteOtherWorker($id);
        return response()->json([
            'message' => 'Other worker deleted successfully',
        ]);
    }


}
