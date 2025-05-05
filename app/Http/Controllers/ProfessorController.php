<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Professor;


class Professors extends Model{

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


class ProfessorController extends Controller
{


    public function validateProfessorData(Request $request){

        $request->validate([
            'name' => 'required|string|max:50',
            'idNumber' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'email' => 'required|string|max:50',
            'allergies_or_conditions' => 'required|string',
        ]);


    }

    public function saveProfessor(Request $request)
    {
        $this->validateProfessorData($request);

        $professor = new Professor();
        $professor->name = $request->input('name');
        $professor->idNumber = $request->input('idNumber');
        $professor->address = $request->input('address');
        $professor->phone = $request->input('phone');
        $professor->email = $request->input('email');
        $professor->allergies_or_conditions = $request->input('allergies_or_conditions');

        $professor->save();

        return redirect()->back()->with('success', 'Professor created successfully.');
    }


    public function destroy_professors($id)
{
$professor = Professor::find($id);

$professor->delete();

return redirect()->back();

}


public function update_professors(Request $request, $id){

        $professor = Professor::find($id);

        $this->validateProfessorData($request);

        $professor->name = $request->input('name');
        $professor->idNumber = $request->input('idNumber');
        $professor->address = $request->input('address');
        $professor->phone = $request->input('phone');
        $professor->email = $request->input('email');
        $professor->allergies_or_conditions = $request->input('allergies_or_conditions');

        $professor->save();

        return redirect()->back()->with('update', 'Se Actualizo la Ficha del profesor.');


}


}
