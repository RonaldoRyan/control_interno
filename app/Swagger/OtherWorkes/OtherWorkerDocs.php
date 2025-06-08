<?php

namespace App\Swagger\OtherWorkes;

use OpenApi\Annotations as OA;


/**
 *                    //create new OtherWorker
 * @OA\Post(
 * path="/api/v1/otherWorkers",
 * tags={"OtherWorkers"},
 * summary="Create a new otherWorker",
 * description = "Creates a new otherWorker record in the system",
 * security={{"sanctum": {}}},
 * @OA\RequestBody(
 *  required=true,
 *  description= "OtherWorker data",
 *  @OA\JsonContent(ref="#/components/schemas/OtherWorker")
 * ),
 * @OA\Response(
 *         response=201,
 *         description="OtherWorker created successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="OtherWorker created successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/OtherWorker")
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
 *                         //get a otherWorker
 * @OA\Get(
 *     path="/api/v1/otherWorker",
 *     tags={"OtherWorkers"},
 *     summary="Get paginated list of otherWorkers",
 *     description="Retrieve a paginated list of all otherWorkers with optional filtering",
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
 *         description="OtherWorkers retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="Students retrieved successfully"),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/OtherWorker")
 *             ),
 *             @OA\Property(property="links", ref="#/components/schemas/PaginationLinks"),
 *             @OA\Property(property="meta", ref="#/components/schemas/PaginationMeta")
 *         )
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                           //Get otherWorker by id
 * @OA\Get(
 *     path="/api/v1/otherWorkers/{otherWorker}",
 *     tags={"OtherWorkers"},
 *     summary="Get otherWorker by ID",
 *     description="Retrieve a specific otherWorker by their ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="student",
 *         in="path",
 *         required=true,
 *         description="OtherWorker ID",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OtherWorker retrieved successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="OtherWorker retrieved successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/OtherWorker")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="OtherWorker not found",
 *         @OA\JsonContent(ref="#/components/responses/NotFound")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *                           //update otherWorker
 * @OA\Put(
 *     path="/api/v1/otherWorkers/{otherWorker}",
 *     tags={"OtherWorkers"},
 *     summary="Update an existing otherWorker",
 *     description="Update otherWorker information by ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="otherWorker",
 *         in="path",
 *         required=true,
 *         description="OtherWorker ID to update",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Updated otherWorker data",
 *         @OA\JsonContent(ref="#/components/schemas/OtherWorkerUpdate")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OtherWorker updated successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="OtherWorker updated successfully"),
 *             @OA\Property(property="data", ref="#/components/schemas/OtherWorkerUpdate")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="OtherWorker not found",
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
 *     path="/api/v1/otherWorkers/{otherWorker}",
 *     tags={"OtherWorkers"},
 *     summary="Delete a otherWorker",
 *     description="Soft delete a otherWorker by ID",
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="otherWorker",
 *         in="path",
 *         required=true,
 *         description="OtherWorker ID to delete",
 *         @OA\Schema(type="integer", minimum=1, example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OtherWorker deleted successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="string", example="OtherWorker deleted successfully"),
 *             @OA\Property(property="data", type="object", nullable=true, example=null)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="OtherWorker not found",
 *         @OA\JsonContent(ref="#/components/responses/NotFound")
 *     ),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 */
class OtherWorkerDocs{}
