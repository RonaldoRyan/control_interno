<?php

namespace App\Services\AuthServices;
use Illuminate\Support\Facades\Log;
use App\DTOs\LoginUserDTO;
use App\DTOs\RegisterUserDTO;
use App\Http\Requests\AuthRequest\LoginUserRequest;
use App\Http\Requests\AuthRequest\RegisterUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\Counts;
use Illuminate\Support\Facades\Auth;




class AuthServices
{


public function register(RegisterUserDTO $dto): User
{
    $password = Str::random(10);

    $user = User::create([
        'name'     => $dto->name,
        'email'    => $dto->email,
        'password' => Hash::make($password),
    ]);

    $defaultRole = Role::where('name', 'profesor')->first();
    $user->assignRole($defaultRole);

    try {
        Mail::to($user->email)->send(new Counts($user, $password));
        Log::info("Correo enviado a {$user->email}");
    } catch (\Throwable $e) {
        Log::error('Error al enviar correo de registro', ['error' => $e->getMessage()]);
        // Devolver igualmente el usuario, pero loguear que el correo falló
    }


        return $user;
}
public function login(LoginUserDTO $dto): array
{
    // 1) Verifica credenciales
    if (!Auth::attempt([
        'email'    => $dto->email,
        'password' => $dto->password
    ], false)) {
        throw new \Exception('Credenciales inválidas');
    }

    // 2) Obtiene el usuario autenticado
    $user = Auth::user();



    // 3) Genera un token personal access
    $token = $user->createToken('auth_token')->plainTextToken;

    // 4) Retorna datos para el controlador
    return [
        'user'  => $user,
        'token' => $token,
    ];
}



    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with(['Logout' => 'Usuario Deslogueado']);
    }



}
