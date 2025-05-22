<?php

namespace App\Http\Controllers;
use App\Http\Requests\OtherWorkerRequest\StoreOtherWorkerRequest;
use App\Http\Requests\OtherWorkerRequest\UpdateOtherWorkerRequest;
use App\DTOs\OtherWorkerDTO;
use App\Services\OtherWorkerServices\OtherWorkerService;




class OtherWorkersController extends Controller
{

    protected OtherWorkerService $otherWorkerService;

    public function __construct(OtherWorkerService $otherWorkerService)
    {
        $this->otherWorkerService = $otherWorkerService;
    }


    public function saveOtherWorker(StoreOtherWorkerRequest $request)
    {
        $dto = OtherWorkerDTO::fromArray($request->validated());

        (new OtherWorkerService())->createOtherWorker($dto);

        return redirect()->back()->with('success', 'Other Worker created successfully.');
    }



    public function updateOtherWorker(UpdateOtherWorkerRequest $request, $id)
    {
        $dto = OtherWorkerDTO::fromArray($request->validated());

        $this->otherWorkerService->updateOtherWorker($id, $dto);

        return redirect()->back()->with('success', 'Other Worker Updated.');
    }



    public function destroy_others_workers(int $id)
    {
        $this->otherWorkerService->deleteOtherWorker($id);

        return redirect()
            ->back()
            ->with('success', 'Other Worker Eliminated.');
    }

}
