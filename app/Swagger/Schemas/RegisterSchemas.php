<?php
namespace App\Swagger\Schemas;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="RegisterUserRequest",
 *     type="object",
 *     required={"name", "email", "password", "password_confirmation"},
 *
 *     @OA\Property(property="name", type="string", example="Juan Pérez"),
 *     @OA\Property(property="email", type="string", format="email", example="juan@example.com"),
 *     @OA\Property(property="password", type="string", format="password", example="Password123"),
 *     @OA\Property(property="password_confirmation", type="string", format="password", example="Password123")
 * )
 * @OA\Schema(
 *     schema="RegisterUserResponse",
 *     type="object",
 *     @OA\Property(property="message", type="string", example="User created successfully"),
 *     @OA\Property(property="user", type="object",
 *         @OA\Property(property="id", type="integer", example=10),
 *         @OA\Property(property="name", type="string", example="Juan Pérez"),
 *         @OA\Property(property="email", type="string", example="juan@example.com"),
 *         @OA\Property(property="created_at", type="string", format="date-time"),
 *         @OA\Property(property="updated_at", type="string", format="date-time")
 *     )
 * )
 */
class RegisterSchemas{}
