<?php

namespace App\Swagger\Tags;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Students",
 *     description="Endpoints for managing student records"
 * )
 *
 * @OA\Tag(
 *     name="Professors",
 *     description="Endpoints for managing professor records"
 * )
 *
 * @OA\Tag(
 *     name="OtherWorkers",
 *     description="Endpoints for managing other worker records"
 * )
 *
 * @OA\Tag(
 *     name="Users",
 *     description="Endpoints for managing users and roles"
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Endpoints for authentication: login, register and logout"
 * )
 *
 * @OA\Tag(
 *     name="PDF",
 *     description="Endpoints for generating PDF reports"
 * )
 *
 * @OA\Tag(
 * name = "Passwords",
 * description="Endpoints for Passwords methods"
 * )
 */
class Tags {}
