<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {


        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

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
        ];
    }
}
