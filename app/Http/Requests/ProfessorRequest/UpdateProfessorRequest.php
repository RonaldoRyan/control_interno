<?php

namespace App\Http\Requests\ProfessorRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfessorRequest extends FormRequest
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
            'idNumber' => 'required|integer',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email|email',
            'allergies_or_conditions' => 'nullable|string|max:255',
        ];
    }
}

