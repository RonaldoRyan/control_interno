<?php
namespace App\Swagger\PDF;

use OpenApi\Annotations as OA;


/**
 * * @OA\Get(
 *     path="/api/v1/pdf/student/{id}",
 *     summary="Export student PDF",
 *     tags={"PDF"},
 *     security={{"sanctum": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Student ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="PDF generated successfully",
 *         @OA\Header(
 *             header="Content-Type",
 *             description="MIME type of the PDF",
 *             @OA\Schema(type="string", example="application/pdf")
 *         ),
 *         @OA\Header(
 *       header="Content-Disposition",
 *      description="Indicates inline rendering in browser",
 *      @OA\Schema(type="string", example="inline; filename=ficha_estudiante_JohnDoe.pdf")
 *     )
 *
 *     ),
 *     @OA\Response(response=404, description="Student not found"),
 *     @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
 *     @OA\Response(response=500, ref="#/components/responses/ServerError")
 * )
 *
 */
class PdfDocs{}
