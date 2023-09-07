<?php

namespace App\Http\Controllers;

use Dompdf\Options;
use Dompdf\Dompdf;
use App\Models\Student;

class PDFController extends Controller
{
    public function exportToPDF($id)

{

// Obtén el registro específico de la base de datos utilizando el ID
$student = Student::findOrFail($id);

// Genera el HTML para el PDF utilizando el registro obtenido
$html = view('pdf', compact('student'))->render();

// Crea una instancia de Dompdf con opciones
$options = new \Dompdf\Options();
$options->set('chroot', realpath(public_path())); // Asegúrate de que Dompdf puede acceder a las imágenes

$dompdf = new \Dompdf\Dompdf($options);
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait'); // Define el tamaño y la orientación del papel

// Renderiza el PDF
$dompdf->render();

// Genera el nombre del archivo PDF
$filename = 'registro_' . $student->name . '.pdf';

// Descarga el archivo PDF al navegador
return $dompdf->stream($filename);




}


}





