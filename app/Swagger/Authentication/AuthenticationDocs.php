<?php

namespace App\Swagger\Authentication;

use OpenApi\Annotations as OA;

/**
 *                          //Login
 * @OA\Post(
 *     path="/api/v1/login",
 *     tags={"Auth"},
 *     summary="User login",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="jonhdoe@gmail.com"),
 *             @OA\Property(property="password", type="string", format="password", example="jonhdoe25")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="token", type="string", example="token"),
 *             @OA\Property(property="user", type="object")
 *         )
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=422, ref="#/components/schemas/ValidationError"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                             //logout
 * @OA\Post(
 *     path="/api/v1/logout",
 *     tags={"Auth"},
 *     summary="User logout",
 *     security={{"sanctum":{}}},
 *     description="Revoke the current access token of the authenticated user",
 *     @OA\Response(
 *         response=200,
 *         description="Successful logout",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User logged out successfully")
 *         )
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                             //register Users
 * @OA\Post(
 *     path="/api/v1/register",
 *     tags={"Auth"},
 *     summary="Register new user",
 *     description="Create a new user with the predefined request.",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/RegisterUserRequest")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="User registered correctly",
 *         @OA\JsonContent(ref="#/components/schemas/RegisterUserResponse")
 *     ),
 *     @OA\Response(response=422, ref="#/components/schemas/ValidationError"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 */
class AuthenticationDocs {}
