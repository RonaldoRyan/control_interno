<?php
namespace App\Swagger\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  schema = "Professor",
 *  type = "object",
 *  required={"name", "idNumber", "address","phone","email", "allergies_or_conditions"},
 *
 * @OA\Property(property="name", type="string", example="Jonh Doe"),
 * @OA\Property(property="idNumber", type="integer", example="65656555"),
 * @OA\Property(property="address", type="string", example="San Ramon"),
 * @OA\Property(property="phone", type="string", example="465564564"),
 * @OA\Property(property="email", type="email", example="jonhdoe@example.com"),
 * @OA\Property(property="allergies_or_conditions", type="string", example="none")
 * )
 *
 *
 * @OA\Schema(
 *   schema = "ProfessorUpdate",
 *   type = "object",
 *   required={"name", "idNumber", "address","phone","email", "allergies_or_conditions"},
 *
 * @OA\Property(property="name", type="string", example="Juan Doe"),
 * @OA\Property(property="idNumber", type="integer", example="58
 * 64864684"),
 * @OA\Property(property="address", type="string", example="San Ramon"),
 * @OA\Property(property="phone", type="string", example="465564564"),
 * @OA\Property(property="email", type="email", example="jonhdoe@example.com"),
 * @OA\Property(property="allergies_or_conditions", type="string", example="everything")
 * )
 */
class ProfessorSchema{}
