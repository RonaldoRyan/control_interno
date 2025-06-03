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
use Illuminate\Http\JsonResponse;




class AuthController extends Controller
{


    public function __construct(protected AuthServices $authServices){}



    public function register(RegisterUserRequest $request): JsonResponse {

        $dto = RegisterUserDTO::fromArray($request->validated());
        $user = $this->authServices->register($dto);
        $token = $this->authServices->getTokenFor($user);

          Mail::to($user->email)->queue(new Counts($user, 'additional_argument'));

        return response()->json([
            'message'=>'User created successfully',
            'user'=>$user,
            'access_token'=>$token,

        ], 201);
    }

    /**
     * @throws \DomainException
     */
    public function login(LoginUserRequest $request): JsonResponse
{
    $dto = LoginUserDTO::fromArray($request->validated());

    try {
        $result = $this->authServices->login($dto);
    } catch (\DomainException $e) {
        return response()->json(['message' => $e->getMessage()], 401);
    }

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



