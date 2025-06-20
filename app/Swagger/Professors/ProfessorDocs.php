<?php
namespace App\Swagger\Professors;


use OpenApi\Annotations as OA;


/**
 *                    //create new professor
 * @OA\Post(
 * path="/api/v1/professors",
 * tags={"Professors"},
 * summary="Create a new professor",
 * description = "Creates a new professor record in the system",
 * security={{"sanctum": {}}},
 * @OA\RequestBody(
 *  required=true,
 *  description= "Professor data",
 *  @OA\JsonContent(ref="#/components/schemas/Professor")
 * ),
 * @OA\Response(
 *         response=201,
 *         description="Professor created successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Professor created successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/Professor")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(ref="#/components/schemas/ValidationError")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *
 *                         //get a professor
 * @OA\Get(
 *     path="/api/v1/professor",
 *     tags={"Professors"},
 *     summary="Get paginated list of professors",
 *     description="Retrieve a paginated list of all professors with optional filtering",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Page number for pagination",
 *         required=false,
 *         @OA\Schema(type="integer", minimum=1, default=1, example=1)
 *     ),
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         description="Number of items per page",
 *         required=false,
 *         @OA\Schema(type="integer", minimum=1, maximum=100, default=15, example=15)
 *     ),
 *     @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Search term for student name or email",
 *         required=false,
 *         @OA\Schema(type="string", example="john")
 *     ),
 *     @OA\Parameter(
 *         name="status",
 *         in="query",
 *         description="Filter by student status",
 *         required=false,
 *         @OA\Schema(type="string", enum={"active", "inactive", "suspended"}, example="active")
 *     ),
 *     @OA\Parameter(
 *         name="sort_by",
 *         in="query",
 *         description="Field to sort by",
 *         required=false,
 *         @OA\Schema(type="string", enum={"name", "email", "created_at", "updated_at"}, default="created_at")
 *     ),
 *     @OA\Parameter(
 *         name="sort_order",
 *         in="query",
 *         description="Sort direction",
 *         required=false,
 *         @OA\Schema(type="string", enum={"asc", "desc"}, default="desc")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Professors retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Students retrieved successfully"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Professor")
 *             ),
 *             @OA\Property(property="links", ref="#/components/schemas/PaginationLinks"),
 *             @OA\Property(property="meta", ref="#/components/schemas/PaginationMeta")
 *         )
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                           //Get professor by id
 * @OA\Get(
 *     path="/api/v1/professors/{professor}",
 *     tags={"Professors"},
 *     summary="Get professor by ID",
 *     description="Retrieve a specific professor by their ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="student",
 *         in="path",
 *         required=true,
 *         description="Professor ID",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Professor retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Professor retrieved successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/Professor")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Professor not found",
 *         @OA\JsonContent(ref="#/components/responses/NotFound")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                           //update professor
 * @OA\Put(
 *     path="/api/v1/professors/{professor}",
 *     tags={"Professors"},
 *     summary="Update an existing professor",
 *     description="Update professor information by ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="professor",
 *         in="path",
 *         required=true,
 *         description="Professor ID to update",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Updated professor data",
 *         @OA\JsonContent(ref="#/components/schemas/ProfessorUpdate")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Professor updated successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Professor updated successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/ProfessorUpdate")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Professor not found",
 *         @OA\JsonContent(ref="#/components/responses/NotFound")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(ref="#/components/schemas/ValidationError")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                            //delete student
 * @OA\Delete(
 *     path="/api/v1/professors/{professor}",
 *     tags={"Professors"},
 *     summary="Delete a professor",
 *     description="Soft delete a professor by ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="professor",
 *         in="path",
 *         required=true,
 *         description="Professor ID to delete",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Professor deleted successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Professor deleted successfully"),
 *             @OA\Property(property="data", type="object", nullable=true, example=null)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Professor not found",
 *         @OA\JsonContent(ref="#/components/responses/NotFound")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 */
class ProfessorDocs{}
