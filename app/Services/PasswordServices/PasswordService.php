<?php

namespace App\Services\PasswordServices;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgetPasswords;




class PasswordService
{
   public function change(User $user, string $current, string $new):  bool
   {

         //verificate that the current password of the user is correct
        if (!Hash::check($current, $user->password)) {
            return false;
        }


         $user->password = Hash::make($new);
         $user->save();
         return true;

   }


    public function sendResetLink(string $email): bool
       {
        $user = User::where('email', $email)->firstOrFail();
        $token = Str::random(60);
        $user->remember_token = $token;
        $user->save();

        $url = url('/reset-password/'.$token);
        Mail::to($email)->send(new ForgetPasswords($url));
        return true;
       }


       public function reset(string $token, string $password): bool
       {
        $user = User::where('remember_token', $token)->firstOrFail();
        $user->password = Hash::make($password);
        $user->remember_token = null;
        $user->save();
        return true;
       }



}

