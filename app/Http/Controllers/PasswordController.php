<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswords;








class PasswordController extends Controller
{
    public function changePassword(Request $request){
         // Validar los datos del formulario de cambio de contraseña
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);


       /**
         *@var \App\Models\User $user
                                      */
        $user = Auth::user();


    // Verificar que la contraseña actual del usuario sea correcta
    if (Hash::check($request->current_password, $user->password)) {
        // Actualizar la contraseña del usuario
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirigir al usuario de vuelta a la página de perfil con un mensaje de éxito
        return redirect()->route('profile')->with('change', '¡Contraseña actualizada con éxito!');
    } else {
        // Si la contraseña actual es incorrecta, mostrar un mensaje de error y redirigir al usuario de vuelta al formulario de cambio de contraseña
        return redirect()->route('profile')->with('error', 'La contraseña actual es incorrecta');
    }
    }



    public function showFormForgetPassword(){
        $token = 0;
        return view('form_forgetPassword', ['token' => $token]);

    }




    public function sendEmailResetPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        // Verificar si el usuario ya existe en la base de datos
        $existingUser = User::where('email', $request->email)->exists();

        if (!$existingUser) {
            return redirect()->back()->withErrors(['error' => 'El usuario no existe']);
        }

        // Generar una contraseña aleatoria
        $token = Str::random(10);

        // Actualizar el token de restablecimiento de contraseña del usuario en la base de datos
        $user = User::where('email', $request->email)->first();
        $user->remember_token = $token;
        $user->save();

        // Construir la URL para restablecer la contraseña
    $url = url('/reset-password/' . $token);

    // Enviar correo electrónico al usuario con el enlace de restablecimiento de contraseña
    Mail::to($user->email)->send(new ForgetPasswords($url));



    return redirect()->route('index')->with('status', 'Se ha enviado un correo electrónico con instrucciones para restablecer la contraseña.');








    }

   // Mostrar el formulario para restablecer la contraseña
public function showResetPasswordForm($token){
    if (!$token) {
        return redirect()->back()->withErrors(['error' => 'Token inválido']);
    }

    $user = User::where('remember_token', $token)->first();

    if (!$user) {
        return redirect()->back()->withErrors(['error' => 'Token inválido']);
    }

    return view('reset_password', ['token' => $token]);
}

// Restablecer la contraseña
public function resetPassword(Request $request, $token){
    if (!$token) {
        return redirect()->back()->withErrors(['error' => 'Token inválido']);
    }

    // Validar datos
    $request->validate([
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
    ]);

    // Obtener el usuario con el token de restablecimiento de contraseña
    $user = User::where('remember_token', $token)->first();

    if (!$user) {
        return redirect()->back()->withErrors(['error' => 'Token inválido']);
    }

    // Actualizar la contraseña del usuario
    $user->password = Hash::make($request->password);
    $user->remember_token = null;
    $user->save();

    // Redirigir al usuario a la página de inicio de sesión
    return redirect()->route('index')->with('status', 'La contraseña se ha restablecido con éxito.');
}



}



