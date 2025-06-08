<?php

namespace App\Swagger\Schemas;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 * schema = "Student",
 * type = "object",
 * required={"name", "birth_date", "age", "address", "dad_name", "idNumber_dad", "dad_phone", "mom_name", "idNumber_mom", "mom_phone", "emergency_contact", "emergency_Idcontact", "emergency_contact_phone", "vaccine_information", "allergies_or_conditions"},
 *
 *     @OA\Property(property="name", type="string", example="Luis Solis"),
 *     @OA\Property(property="birth_date", type="string", format="date", example="2000-01-01"),
 *     @OA\Property(property="age", type="integer", example=23),
 *     @OA\Property(property="address", type="string", example="123 Main St"),
 *     @OA\Property(property="benefits", type="string", example="None"),
 *     @OA\Property(property="dad_name", type="string", example="John Doe Sr."),
 *     @OA\Property(property="idNumber_dad", type="integer", example=123456789),
 *     @OA\Property(property="dad_phone", type="integer", example=1234567890),
 *     @OA\Property(property="mom_name", type="string", example="Jane Doe"),
 *     @OA\Property(property="idNumber_mom", type="integer", example=987654321),
 *     @OA\Property(property="mom_phone", type="integer", example=0987654321),
 *     @OA\Property(property="emergency_contact", type="string", example="Alice Smith"),
 *     @OA\Property(property="emergency_Idcontact", type="integer", example=1),
 *     @OA\Property(property="emergency_contact_phone", type="integer", example=1122334455),
 *     @OA\Property(property="vaccine_information", type="string", example="All vaccines up to date"),
 *     @OA\Property(property="allergies_or_conditions", type="string", example="None")
 *     )
 *
 *
 *
 *
 *@OA\Schema(
 *  schema = "StudentUpdate",
 * type = "object",
 * required={"name", "birth_date", "age", "address", "dad_name", "idNumber_dad", "dad_phone", "mom_name", "idNumber_mom", "mom_phone", "emergency_contact", "emergency_Idcontact", "emergency_contact_phone", "vaccine_information", "allergies_or_conditions"},
 *
 *     @OA\Property(property="name", type="string", example="Carlos Castro"),
 *     @OA\Property(property="birth_date", type="string", format="date", example="2000-01-01"),
 *     @OA\Property(property="age", type="integer", example=10),
 *     @OA\Property(property="address", type="string", example="123 Main St"),
 *     @OA\Property(property="benefits", type="string", example="None"),
 *     @OA\Property(property="dad_name", type="string", example="John Doe Sr."),
 *     @OA\Property(property="idNumber_dad", type="integer", example=123456789),
 *     @OA\Property(property="dad_phone", type="integer", example=1234567890),
 *     @OA\Property(property="mom_name", type="string", example="Jane Doe"),
 *     @OA\Property(property="idNumber_mom", type="integer", example=987654321),
 *     @OA\Property(property="mom_phone", type="integer", example=0987654321),
 *     @OA\Property(property="emergency_contact", type="string", example="Alice Smith"),
 *     @OA\Property(property="emergency_Idcontact", type="integer", example=1),
 *     @OA\Property(property="emergency_contact_phone", type="integer", example=1122334455),
 *     @OA\Property(property="vaccine_information", type="string", example="All vaccines up to date"),
 *     @OA\Property(property="allergies_or_conditions", type="string", example="Milk")
 *     )
 */
 class StudentSchema{}
