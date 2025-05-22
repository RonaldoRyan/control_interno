<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Other_worker;
use App\Services\PdfServices\PdfService;
use Illuminate\Http\JsonResponse;

class PdfController extends Controller
{
    public function exportStudentPdf($id, PdfService $pdfService)
    {
        $student = Student::findOrFail($id);
        $pdfContent = $pdfService->generatePdf($student, 'pdf.student', 'student');
        $filename = 'ficha_estudiante_' . $student->name . '.pdf';

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=\"$filename\""
        ]);
    }

    public function exportProfessorPdf($id, PdfService $pdfService)
    {
        $professor = Professor::findOrFail($id);
        $pdfContent = $pdfService->generatePdf($professor, 'pdf.professor', 'professor');
        $filename = 'ficha_profesor_' . $professor->name . '.pdf';

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=\"$filename\""
        ]);
    }

    public function exportOtherWorkerPdf($id, PdfService $pdfService)
    {
        $otherWorker = Other_worker::findOrFail($id);
        $pdfContent = $pdfService->generatePdf($otherWorker, 'pdf.other_worker', 'otherWorker');
        $filename = 'ficha_personal_' . $otherWorker->name . '.pdf';

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=\"$filename\""
        ]);
    }
}
