<?php

namespace App\Swagger\Students;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Students",
 *     description="Student management operations"
 * )
 *
 *                                //create new student
 * @OA\Post(
 *     path="/api/v1/students",
 *     tags={"Students"},
 *     summary="Create a new student",
 *     description="Creates a new student record in the system",
 *     security={{"sanctum": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Student data",
 *         @OA\JsonContent(ref="#/components/schemas/Student")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Student created successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Student created successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/Student")
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
 *                         //get a student
 * @OA\Get(
 *     path="/api/v1/students",
 *     tags={"Students"},
 *     summary="Get paginated list of students",
 *     description="Retrieve a paginated list of all students with optional filtering",
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
 *         description="Students retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Students retrieved successfully"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Student")
 *             ),
 *             @OA\Property(property="links", ref="#/components/schemas/PaginationLinks"),
 *             @OA\Property(property="meta", ref="#/components/schemas/PaginationMeta")
 *         )
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                           //Get student by id
 * @OA\Get(
 *     path="/api/v1/students/{student}",
 *     tags={"Students"},
 *     summary="Get student by ID",
 *     description="Retrieve a specific student by their ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="student",
 *         in="path",
 *         required=true,
 *         description="Student ID",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Student retrieved successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/Student")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found",
 *         @OA\JsonContent(ref="#/components/responses/NotFound")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                           //update students
 * @OA\Put(
 *     path="/api/v1/students/{student}",
 *     tags={"Students"},
 *     summary="Update an existing student",
 *     description="Update student information by ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="student",
 *         in="path",
 *         required=true,
 *         description="Student ID to update",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Updated student data",
 *         @OA\JsonContent(ref="#/components/schemas/StudentUpdate")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student updated successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Student updated successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/StudentUpdate")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found",
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
 *     path="/api/v1/students/{student}",
 *     tags={"Students"},
 *     summary="Delete a student",
 *     description="Soft delete a student by ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="student",
 *         in="path",
 *         required=true,
 *         description="Student ID to delete",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Student deleted successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Student deleted successfully"),
 *             @OA\Property(property="data", type="object", nullable=true, example=null)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Student not found",
 *         @OA\JsonContent(ref="#/components/responses/NotFound")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 */
class StudentDocs{}
