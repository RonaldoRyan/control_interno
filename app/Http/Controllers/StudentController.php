<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Student;



class Students extends Model{



public function __get($property)
{
if (property_exists($this, $property)) {
    return $this->$property;
}
}

public function __set($property, $value)
{
if (property_exists($this, $property)) {
    $this->$property = $value;
}
return $this;
}





}


class StudentController extends Controller
{
    private function validateStudentData(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'age' => 'required|integer',
            'address' => 'required|string',
            'benefits' => 'required|string',
            'dad_name' => 'nullable|string|max:50',
            'dad_phone' => 'nullable|integer',
            'idNumber_dad'=>'nullable|integer',
            'mom_name' => 'required|string|max:50',
            'mom_phone' => 'required|integer',
            'idNumber_mom' => 'required|integer',
            'emergency_contact' => 'required|string|max:50',
            'emergency_Idcontact' => 'required|integer',
            'emergency_contact_phone' => 'required|integer',
            'vaccine_information' => 'required|string',
            'allergies_or_conditions' => 'required|string',
        ]);
    }

    public function saveStudent(Request $request)
    {

        $this->validateStudentData($request);

        $student = new Student();
        $student->name = $request->input('name');
        $student->birth_date = $request->input('birth_date');
        $student->age = $request->input('age');
        $student->address = $request->input('address');
        $student->benefits = $request->benefits;
        $student->dad_name = $request->input('dad_name');
        $student->idNumber_dad = $request->input('idNumber_dad');
        $student->dad_phone = $request->input('dad_phone');
        $student->mom_name = $request->input('mom_name');
        $student->idNumber_mom = $request->input('idNumber_mom');
        $student->mom_phone = $request->input('mom_phone');
        $student->emergency_contact = $request->input('emergency_contact');
        $student->emergency_Idcontact = $request->input('emergency_Idcontact');
        $student->emergency_contact_phone = $request->input('emergency_contact_phone');
        $student->vaccine_information = $request->input('vaccine_information');
        $student->allergies_or_conditions = $request->input('allergies_or_conditions');

        $student->save();

        return redirect()->back()->with('success', 'Student created successfully.');
    }


// eliminacion de los datos
public function destroy_students($id)
{
$student = Student::find($id);

$student->delete();

return redirect()->back()->with('success', 'Registro Eliminado');


}

public function update_students(Request $request, $id){




$students = Student::find($id);


$this->validateStudentData($request);


$students->name = $request->input('name');
$students->birth_date = $request->input('birth_date');
$students->age = $request->input('age');
$students->address = $request->input('address');
$students->benefits = $request->benefits;
$students->dad_name = $request->input('dad_name');
$students->idNumber_dad = $request->input('idNumber_dad');
$students->dad_phone = $request->input('dad_phone');
$students->mom_name = $request->input('mom_name');
$students->idNumber_mom = $request->input('idNumber_mom');
$students->mom_phone = $request->input('mom_phone');
$students->emergency_contact = $request->input('emergency_contact');
$students->emergency_Idcontact = $request->input('emergency_Idcontact');
$students->emergency_contact_phone = $request->input('emergency_contact_phone');
$students->vaccine_information = $request->input('vaccine_information');
$students->allergies_or_conditions = $request->input('allergies_or_conditions');

// Guardar los cambios en la base de datos
$students->save();

// Redirigir a la página de detalles de la orden actualizada
return redirect()->back()->with('update', 'Se Actualizo la Ficha del estudiante');

}
}
