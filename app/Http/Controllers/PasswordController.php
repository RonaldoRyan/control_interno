<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\PasswordServices\PasswordService;
use App\Http\Requests\PasswordRequest\ChangePasswordRequest;
use App\Http\Requests\PasswordRequest\ForgotPasswordRequest;
use App\Http\Requests\PasswordRequest\ResetPasswordRequest;







class PasswordController extends Controller
{

    public function __construct(protected PasswordService $svc){}

    public function showChangeForm(){
        return view('change_password');
    }



    public function changePassword(ChangePasswordRequest $request){

        $ok = $this->svc->change(
            Auth::user(),
            $request->input('current_password'),
            $request->input('password')
        );

        if (! $ok){
            return redirect()->route('profile')->with('error', 'La contraseña actual es incorrecta');
        }

        return redirect()->route('profile')->with('status', 'La contraseña se ha cambiado con éxito');
    }





    public function showForgotForm(){
        return view('form_forgetPassword');
    }


    public function sendEmailResetPassword(ForgotPasswordRequest $request){
        $this->svc->sendResetLink($request->input('email'));

        return redirect()->route('index')->with('status', 'Password reset link sent to your email address.');

    }


   public function showResetPasswordForm($token){

    return view('reset_password', ['token' => $token]);

   }

    public function resetPassword(ResetPasswordRequest $request){


        $this->svc->reset(
            $request->input('token'),
            $request->input('password')
        );

        return redirect()->route('index')->with('status', 'La contraseña se ha restablecido con éxito.');
    }









}



