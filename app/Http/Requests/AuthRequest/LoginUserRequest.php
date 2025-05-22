<?php

namespace App\Http\Requests\AuthRequest;
use Illuminate\Foundation\Http\FormRequest;



class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ];
    }
}
// Compare this snippet from app/Http/Controllers/AuthController.php:

