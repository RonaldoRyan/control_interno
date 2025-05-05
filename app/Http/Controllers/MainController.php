<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Models\Other_worker;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(){

        return view('index');
    }

    public function panel()
    {
        return view('panel');

    }

    public function profile(){
        return view ('profile');
    }

    public function forgetPassword(){
        return view ('forgetPassword');
    }


    public function sections($option)
    {
        $viewData = [];

        switch ($option) {
            case 'students':
                $students = Student::all();
                $viewData['students'] = $students;
                break;
            case 'professors':
                $professors = Professor::all();
                $viewData['professors'] = $professors;
                break;
            case 'othersWorkers':
                $othersWorkers = Other_worker::all();
                $viewData['othersWorkers'] = $othersWorkers;
                break;
            case 'mealBenefit':
                $students = Student::where('benefits', 'Solo Alimentacion')->get();
                $viewData['students'] = $students;
                $viewData['title'] = 'Servicio de Comedor';
                break;
            case 'babyGroup':
                $ageRange = $this->getAgeRange($option);
                $students = Student::whereBetween('age', $ageRange)
                                    ->where('benefits', 'cuido')
                                    ->get();
                $viewData['students'] = $students;
                $viewData['title'] = 'Grupo de 0 a 2 años';
                break;
            case 'middleGroup':
                $ageRange = $this->getAgeRange($option);
                $students = Student::whereBetween('age', $ageRange)
                                    ->where('benefits', 'cuido')
                                    ->get();
                $viewData['students'] = $students;
                $viewData['title'] = 'Grupo de 3 a 4 años';
                break;
            case 'olderGroup':
                $ageRange = $this->getAgeRange($option);
                $students = Student::whereBetween('age', $ageRange)
                                    ->where('benefits', 'cuido')
                                    ->get();
                $viewData['students'] = $students;
                $viewData['title'] = 'Grupo de 5 a 6 años';
                break;
        }

        return view('panel', $viewData);
    }









    private function getAgeRange($option){
        switch($option){
            case 'babyGroup':
                return [0, 2];
                break;
            case 'middleGroup':
                return [3, 4];
                break;
            case 'olderGroup':
                return [5, 6];
                break;
        }
    }

}
