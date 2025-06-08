<?php
namespace App\Swagger\Passwords;

use OpenApi\Annotations as OA;


    /**
     * @OA\Post(
     *     path="/api/v1/password/forgot",
     *     tags={"Passwords"},
     *     summary="Send password reset link to email",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Reset link sent successfully"),
     *     @OA\Response(response=422, ref="#/components/schemas/ValidationError"),
     *     @OA\Response(response=500, ref="#/components/responses/ServerError")
     * )
     *
     * @OA\Post(
     *     path="/api/v1/password/reset",
     *     tags={"Passwords"},
     *     summary="Reset password using token",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"token", "password", "password_confirmation"},
     *             @OA\Property(property="token", type="string", example="1234567890abcdef"),
     *             @OA\Property(property="password", type="string", format="password", example="NewPassword123"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="NewPassword123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Password reset successfully"),
     *     @OA\Response(response=422, ref="#/components/schemas/ValidationError"),
     *     @OA\Response(response=500, ref="#/components/responses/ServerError")
     * )
     *
     * @OA\Post(
     *     path="/api/v1/password/change",
     *     tags={"Passwords"},
     *     summary="Change password for authenticated user",
     *     security={{"sanctum":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"current_password", "password", "password_confirmation"},
     *             @OA\Property(property="current_password", type="string", format="password", example="OldPassword123"),
     *             @OA\Property(property="password", type="string", format="password", example="NewPassword456"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="NewPassword456")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Password changed successfully"),
     *     @OA\Response(response=422, ref="#/components/schemas/ValidationError"),
     *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
     *     @OA\Response(response=500, ref="#/components/responses/ServerError")
     * )
     */
    class PasswordDocs {}

