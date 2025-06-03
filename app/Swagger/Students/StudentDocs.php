<?php

namespace App\Swagger\Students;

use OpenApi\Annotations as OA;





/**
 *                                                   //create a new student
 * /**
 * @OA\Post(
 *     path="/api/v1/students",
 *     tags={"Students"},
 *     summary="Crear nuevo estudiante",
 *     security={{"sanctum": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "birth_date", "age", "address", "dad_name", "idNumber_dad", "dad_phone", "mom_name", "idNumber_mom", "mom_phone", "emergency_contact", "emergency_Idcontact", "emergency_contact_phone", "vaccine_information", "allergies_or_conditions"},
 *s
 *             @OA\Property(property="name", type="string", example="Ronaldo Ryan"),
 *            @OA\Property(property="birth_date", type="string", format="date", example="2000-01-01"),
 *            @OA\Property(property="age", type="integer", example=24),
 *            @OA\Property(property="address", type="string", example="123 Street"),
 *            @OA\Property(property="benefits", type="string", example="Ninguno"),
 *            @OA\Property(property="dad_name", type="string", example="Padre Ejemplo"),
 *            @OA\Property(property="idNumber_dad", type="string", example="123456789"),
 *            @OA\Property(property="dad_phone", type="string", example="123456789"),
 *            @OA\Property(property="mom_name", type="string", example="Madre Ejemplo"),
 *            @OA\Property(property="idNumber_mom", type="string", example="98765431"),
 *            @OA\Property(property="mom_phone", type="string", example="987654321"),
 *            @OA\Property(property="emergency_contact", type="string", example="Tía Ana"),
 *            @OA\Property(property="emergency_Idcontact", type="integer", example=11223344),
 *            @OA\Property(property="emergency_contact_phone", type="string", example="8888888888"),
 *            @OA\Property(property="vaccine_information", type="string", example="Vacunas completas"),
 *            @OA\Property(property="allergies_or_conditions", type="string", example="Ninguna")
 *
 *
 *         )
 *     ),
 *     @OA\Response(response=201, description="Estudiante creado"),
 *     @OA\Response(response=401, description="Unauthorized"),
 *     @OA\Response(response=422, description="Validation error"),
 *     @OA\Response(response=500, description="Internal Server Error"),
 *     @OA\Header(
 *         header="Accept",
 *         description="Forzar respuesta en JSON",
 *         required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     )
 * )
 *                                         // Update an existing student
 * @OA\Put(
 *     path="/api/v1/students/{id}",
 *
 *    summary="Update an existing student",
 *    tags={"Students"},
 *    security={{"sanctum": {}}},
 *
 *    @OA\RequestBody(
 *      required=true,
 *     @OA\JsonContent(
 *     required={"name", "birth_date", "age", "address", "dad_name", "idNumber_dad", "dad_phone", "mom_name", "idNumber_mom", "mom_phone", "emergency_contact", "emergency_Idcontact", "emergency_contact_phone", "vaccine_information", "allergies_or_conditions"},
 *     @OA\Property(property="name", type="string", example="Luis Solis"),
 *     @OA\Property(property="birth_date", type="string", format="date", example="2000-01-01"),
 *     @OA\Property(property="age", type="integer", example=23),
 *     @OA\Property(property="address", type="string", example="123 Main St"),
 *     @OA\Property(property="benefits", type="string", example="None"),
 *     @OA\Property(property="dad_name", type="string", example="John Doe Sr."),
 *     @OA\Property(property="idNumber_dad", type="string", example="123456789"),
 *     @OA\Property(property="dad_phone", type="string", example="1234567890"),
 *     @OA\Property(property="mom_name", type="string", example="Jane Doe"),
 *     @OA\Property(property="idNumber_mom", type="string", example="987654321"),
 *     @OA\Property(property="mom_phone", type="string", example="0987654321"),
 *     @OA\Property(property="emergency_contact", type="string", example="Alice Smith"),
 *     @OA\Property(property="emergency_Idcontact", type="integer", example=1),
 *     @OA\Property(property="emergency_contact_phone", type="string", example="1122334455"),
 *     @OA\Property(property="vaccine_information", type="string", example="All vaccines up to date"),
 *     @OA\Property(property="allergies_or_conditions", type="string", example="None")
 *     )
 *    ),
 *     @OA\Response(response=201, description="Student updated successfully"),
 *     @OA\Response(response=422, description="Validation error"),
 *     @OA\Response(response=401, description="Unauthorized")
 * )
 *                                       // Delete an existing student
 *
 *     @OA\Delete(
 *    path="/api/v1/students/{id}",
 *     summary="Delete an existing student",
 *     tags={"Students"},
 *     security={{"sanctum": {}}},
 *
 *      @OA\Parameter(
 *        name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the student to delete",
 *         @OA\Schema(type="integer")
 *
 *    ),
 *      @OA\Response(response=200, description="Student deleted successfully"),
 *      @OA\Response(response=404, description="Student not found"),
 *      @OA\Response(response=401, description="Unauthorized")
 * )
 *                                      // Get all students
 *     @OA\Get(
 *     path="/api/v1/students",
 *     summary="Get all students",
 *     tags={"Students"},
 *     security={{"sanctum": {}}},
 *     @OA\Response(response=200, description="List of students"),
 *     @OA\Response(response=401, description="Unauthorized")
 * )
 *                                    //Get student by ID
 *     @OA\Get(
 *     path="/api/v1/students/{id}",
 *     summary="Get a student by ID",
 *     tags={"Students"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the student",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response=200, description="Student data"),
 *     @OA\Response(response=404, description="Student not found"),
 *     @OA\Response(response=401, description="Unauthorized")
 * )
 */

class StudentDocs {}
