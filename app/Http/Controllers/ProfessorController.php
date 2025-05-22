<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfessorRequest\StoreProfessorRequest;
use App\Http\Requests\ProfessorRequest\UpdateProfessorRequest;
use App\DTOs\ProfessorDTO;
use App\Services\ProfessorServices\ProfessorService;


class ProfessorController extends Controller


{

  protected ProfessorService $professorService;

  public function __construct(ProfessorService $professorService)
  {
    $this->professorService = $professorService;

  }


public function saveProfessor(StoreProfessorRequest $request)
{


    $dto = ProfessorDTO::fromArray($request->validated());

    (new ProfessorService())->createProfessor($dto);


    return redirect()->back()->with('success', 'Professor created successfully.');




}



    public function updateProfessor(UpdateProfessorRequest $request, $id)
    {

        $dto = ProfessorDTO::fromArray($request->validated());

        $this->professorService->updateProfessor($id, $dto);

        return redirect()->back()->with('success', 'Professor Updated.');

    }

    public function destroy_professors(int $id)
    {

        $this->professorService->deleteProfessor($id);

        return redirect()
            ->back()
            ->with('success', 'Professor Eliminated.');

    }
}
