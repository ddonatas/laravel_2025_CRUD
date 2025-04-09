<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $students = Student::with('city')->get();
        $pdf = PDF::loadView('students.pdf', compact('students'));
        return $pdf->download('studentu_sarasas.pdf');
    }
}
