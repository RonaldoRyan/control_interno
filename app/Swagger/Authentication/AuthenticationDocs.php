<?php

namespace App\Swagger\Authentication;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *    path="/api/v1/login",
 *   summary="User login",
 *  tags={"Auth"},
 * security={{"sanctum": {}}},
 * @OA\RequestBody(
 *   required=true,
 *  @OA\JsonContent(
 *     required={"email", "password"},
 *    @OA\Property(property="email", type="string", format="email", example="jonhdoe@gmail.com"),
 *   @OA\Property(property="password", type="string", format="password", example="jonhdoe25"),
 *  )
 * ),
 *  @OA\Response(response=200, description="Login successful",
 *  @OA\JsonContent(
 *         @OA\Property(property="token", type="string", example="token generado"),
 *        @OA\Property(property="user", type="object",)
 * )
 * ),
 *
 * @OA\Response(response=401, description="Unauthorized"),
 * @OA\Response(response=422, description="Validation error")
 *)
 *
 */


class AuthenticationDocs{}
