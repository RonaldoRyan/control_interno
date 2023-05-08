<?php

namespace App\Http\Controllers;

use App\Mail\Counts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class LoginController extends Controller
{


    public function register(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
        ]);

        // Verificar si el usuario ya existe en la base de datos
        $existingUser = User::where('email', $request->email)->exists();

        if ($existingUser) {
            return redirect()->back()->withErrors(['error' => 'El usuario ya existe']);
        }

        // Generar una contraseña aleatoria
        $password = Str::random(10);

        // Crear un nuevo usuario con la contraseña generada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password)
        ]);

        // Obtener el rol por defecto que deseas asignar al usuario
        $defaultRole = Role::where('name', 'profesor')->first();

        // Asignar el rol por defecto al usuario recién creado
        $user->assignRole($defaultRole);

        // Crea una instancia de la clase Counts
         $email = new Counts($user, $password);

        // Envía el correo electrónico
          Mail::to($user->email)->send($email);

          return redirect()->back()->with(['Register' => 'Usario Creado']);



    }



    public function login(Request $request)
    {
        // Validar los datos del formulario de inicio de sesión
        $request->validate([
            'email' => 'required|email',
            'password'=>'required|string'
        ]);

        // Obtener las credenciales del usuario (correo electrónico y contraseña)
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        // Mantener la sesión iniciada si el usuario seleccionó la opción "recordar sesión"
        $remember = ($request->has('remember') ? true : false);

        // Intentar iniciar sesión con las credenciales proporcionadas
        if(Auth::attempt($credentials,$remember)){
            // Regenerar el ID de sesión para evitar ataques de secuestro de sesión
            $request->session()->regenerate();

            // Actualizar la fecha y hora del último inicio de sesión del usuario
                        /**
             * @var \App\Models\User $user
             */
            $user = Auth::user();

            $user->last_login_at = now();
            $user->save();




            // Redirigir al usuario a la página principal después de iniciar sesión
            return redirect(route('panel'))->with('credentials', $credentials);
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error y redirigir al usuario de vuelta a la página de inicio de sesión
            return redirect()->back()->with(['login_error' => 'Datos Incorrectos']);
        }
    }




    public function logout(Request $request)
    {
        // Cerrar sesión del usuario actual
        Auth::logout();

        // Invalidar la sesión actual y generar un nuevo token de sesión para evitar ataques de secuestro de sesión
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir al usuario a la página principal con un mensaje de confirmación
        return redirect(route('index'))->with('message', '¡Sesion Cerrada!');
    }





}
