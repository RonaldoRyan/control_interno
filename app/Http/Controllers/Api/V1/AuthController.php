<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\DTOs\RegisterUserDTO;
use App\DTOs\LoginUserDto;
use App\Http\Requests\AuthRequest\LoginUserRequest;
use App\Http\Requests\AuthRequest\RegisterUserRequest;
use App\Mail\Counts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Services\AuthServices\AuthServices;
use illuminate\Http\JsonResponse;




class AuthController extends Controller
{


    public function __construct(protected AuthServices $authServices){}



    public function register(RegisterUserRequest $request): JsonResponse {

        $dto = RegisterUserDTO::fromArray($request->validated());
        $user = $this->authServices->register($dto);

          Mail::to($user->email)->send(new Counts($user, 'additional_argument'));

        return response()->json(['message'=>'User created successfully', 'user'=>$user], 201);
    }


    public function Login(LoginUserRequest $request): JsonResponse{

        $dto    = LoginUserDTO::fromArray($request->validated());
         // Ahora $result es ['user'=>User, 'token'=>string]
        $result = $this->authServices->login($dto);

        return response()->json([
          'message'      => 'User logged in successfully',
          'access_token' => $result['token'],
           'user'         => $result['user'],
], 200);


    }


    public function logout(Request $request): JsonResponse
    {
        $this->authServices->logout($request);
        return response()->json(['message'=>'User logged out successfully'], 200);
    }

}



