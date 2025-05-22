<?php

namespace App\Services\PdfServices;
use App\Models\Student;
use App\Models\Other_worker;
use App\Models\Professor;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\View\View;


class PdfService
{
    public function generatePdf($data, string $view, string $key = 'data'): string

    {
        $html = view($view, [$key => $data])->render();
        $options = new Options();
        $options->set('chroot', realpath(public_path())); // Ensure Dompdf can access images
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Set paper size and orientation
        $dompdf->render();


        return $dompdf->output();
    }
}
