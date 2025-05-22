<?php
namespace App\Http\Requests\ProfessorRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfessorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change this if you need to implement authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',
            'idNumber' => 'required|integer|unique:professors,idNumber',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email|unique:professors,email',
            'allergies_or_conditions' => 'nullable|string|max:255',
        ];
    }


}
