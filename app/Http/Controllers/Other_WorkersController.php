<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Other_worker;




class Others_workers extends Model{


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


class Other_WorkersController extends Controller
{



    private function validateOtherWorkerData(Request $request){
        $request->validate([
            'name' => 'required|string|max:50',
            'idNumber' => 'required|integer',
            'address' => 'required|string',
            'phone' => 'required|integer',
            'email' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'conditions' => 'required|string',
        ]);
    }



    public function saveOtherWorker(Request $request)
    {
        $this->validateOtherWorkerData($request);

        $otherWorker = new Other_worker();
        $otherWorker->name = $request->input('name');
        $otherWorker->idNumber = $request->input('idNumber');
        $otherWorker->address = $request->input('address');
        $otherWorker->phone = $request->input('phone');
        $otherWorker->email = $request->input('email');
        $otherWorker->section = $request->input('section');
        $otherWorker->conditions = $request->input('conditions');

        $otherWorker->save();

        return redirect()->back()->with('success', 'Ficha Creada de forma Correcta.');
    }


    public function destroy_othersWorkers($id)
    {
    $otherWorker = Other_worker::find($id);

    $otherWorker->delete();

    return redirect()->back()->with('success', 'Professor created successfully.');

    }

    public function update_otherWorkers(Request $request, $id){
        $otherWorker = Other_worker::find($id);

        $this->validateOtherWorkerData($request);



        $otherWorker->name = $request->input('name');
        $otherWorker->idNumber = $request->input('idNumber');
        $otherWorker->address = $request->input('address');
        $otherWorker->phone = $request->input('phone');
        $otherWorker->email = $request->input('email');
        $otherWorker->section = $request->input('section');
        $otherWorker->conditions = $request->input('conditions');

        $otherWorker->save();

        return redirect()->back()->with('update', 'Ficha Actualizada correctamente.');

    }
}
