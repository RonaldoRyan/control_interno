<?php

namespace App\Swagger\Responses;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ValidationError",
 *     title="Validation Error Response",
 *     description="Response structure for validation errors",
 *     type="object",
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         description="General error message",
 *         example="The given data was invalid."
 *     ),
 *     @OA\Property(
 *         property="errors",
 *         type="object",
 *         description="Field-specific validation errors",
 *         @OA\Property(
 *             property="name",
 *             type="array",
 *             @OA\Items(type="string"),
 *             example={"The name field is required."}
 *         ),
 *         @OA\Property(
 *             property="email",
 *             type="array",
 *             @OA\Items(type="string"),
 *             example={"The email must be a valid email address.", "The email has already been taken."}
 *         ),
 *         @OA\Property(
 *             property="age",
 *             type="array",
 *             @OA\Items(type="string"),
 *             example={"The age must be at least 18."}
 *         )
 *     ),
 *     @OA\Property(
 *         property="status_code",
 *         type="integer",
 *         description="HTTP status code",
 *         example=422
 *     )
 * )
 * @OA\Response(
 *     response="Unauthorized",
 *     description="Authentication required",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Unauthenticated."
 *         ),
 *         @OA\Property(
 *             property="status_code",
 *             type="integer",
 *             example=401
 *         )
 *     )
 * )
 * @OA\Response(
 *     response="Forbidden",
 *     description="Access denied",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="This action is unauthorized."
 *         ),
 *         @OA\Property(
 *             property="status_code",
 *             type="integer",
 *             example=403
 *         )
 *     )
 * )
 * @OA\Response(
 *     response="NotFound",
 *     description="Resource not found",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Resource not found."
 *         ),
 *         @OA\Property(
 *             property="status_code",
 *             type="integer",
 *             example=404
 *         )
 *     )
 * )
 * @OA\Response(
 *     response="ServerError",
 *     description="Internal server error",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Internal server error. Please try again later."
 *         ),
 *         @OA\Property(
 *             property="status_code",
 *             type="integer",
 *             example=500
 *         ),
 *         @OA\Property(
 *             property="error_code",
 *             type="string",
 *             description="Internal error code for debugging",
 *             example="ERR_DB_CONNECTION",
 *             nullable=true
 *         )
 *     )
 * )
 * @OA\Response(
 *     response="TooManyRequests",
 *     description="Rate limit exceeded",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Too many requests. Please try again later."
 *         ),
 *         @OA\Property(
 *             property="status_code",
 *             type="integer",
 *             example=429
 *         ),
 *         @OA\Property(
 *             property="retry_after",
 *             type="integer",
 *             description="Seconds to wait before retrying",
 *             example=60
 *         )
 *     )
 * )
 * @OA\Schema(
 *     schema="PaginationLinks",
 *     title="Pagination Links",
 *     description="Pagination navigation links",
 *     type="object",
 *     @OA\Property(
 *         property="first",
 *         type="string",
 *         description="URL to first page",
 *         example="http://localhost:8000/api/v1/students?page=1"
 *     ),
 *     @OA\Property(
 *         property="last",
 *         type="string",
 *         description="URL to last page",
 *         example="http://localhost:8000/api/v1/students?page=10"
 *     ),
 *     @OA\Property(
 *         property="prev",
 *         type="string",
 *         description="URL to previous page",
 *         example="http://localhost:8000/api/v1/students?page=1",
 *         nullable=true
 *     ),
 *     @OA\Property(
 *         property="next",
 *         type="string",
 *         description="URL to next page",
 *         example="http://localhost:8000/api/v1/students?page=3",
 *         nullable=true
 *     )
 * )
 * @OA\Schema(
 *     schema="PaginationMeta",
 *     title="Pagination Metadata",
 *     description="Pagination metadata information",
 *     type="object",
 *     @OA\Property(
 *         property="current_page",
 *         type="integer",
 *         description="Current page number",
 *         example=2
 *     ),
 *     @OA\Property(
 *         property="from",
 *         type="integer",
 *         description="First item number on current page",
 *         example=16
 *     ),
 *     @OA\Property(
 *         property="last_page",
 *         type="integer",
 *         description="Last page number",
 *         example=10
 *     ),
 *     @OA\Property(
 *         property="per_page",
 *         type="integer",
 *         description="Items per page",
 *         example=15
 *     ),
 *     @OA\Property(
 *         property="to",
 *         type="integer",
 *         description="Last item number on current page",
 *         example=30
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="integer",
 *         description="Total number of items",
 *         example=150
 *     ),
 *     @OA\Property(
 *         property="path",
 *         type="string",
 *         description="Base URL path",
 *         example="http://localhost:8000/api/v1/students"
 *     )
 * )
 */

class ErrorResponses
{}
