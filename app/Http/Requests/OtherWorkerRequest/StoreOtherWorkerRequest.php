<?php
namespace App\Http\Requests\OtherWorkerRequest;
use Illuminate\Foundation\Http\FormRequest;


class StoreOtherWorkerRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'idNumber' => 'required|integer',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:50',
            'section' => 'required|string|max:50',
            'conditions' => 'nullable|string|max:255',
        ];
    }
}
