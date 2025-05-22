<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\PasswordServices\PasswordService;
use App\Http\Requests\PasswordRequest\ChangePasswordRequest;
use App\Http\Requests\PasswordRequest\ForgotPasswordRequest;
use App\Http\Requests\PasswordRequest\ResetPasswordRequest;

class PasswordController extends Controller
{
    public function __construct(protected PasswordService $svc) {}

    // Cambiar contraseña para usuario autenticado
    public function changePassword(ChangePasswordRequest $request)
    {
        $ok = $this->svc->change(
            Auth::user(),
            $request->input('current_password'),
            $request->input('password')
        );

        if (! $ok) {
            return response()->json(['message' => 'La contraseña actual es incorrecta'], 422);
        }

        return response()->json(['message' => 'La contraseña se ha cambiado con éxito']);
    }

    // Enviar email para restablecer contraseña
    public function sendEmailResetPassword(ForgotPasswordRequest $request)
    {
        $this->svc->sendResetLink($request->input('email'));

        return response()->json(['message' => 'Se ha enviado un correo electrónico con instrucciones para restablecer la contraseña.']);
    }

    // Restablecer contraseña usando token
    public function resetPassword(ResetPasswordRequest $request)
    {
        $this->svc->reset(
            $request->input('token'),
            $request->input('password')
        );

        return response()->json(['message' => 'La contraseña se ha restablecido con éxito.']);
    }
}
