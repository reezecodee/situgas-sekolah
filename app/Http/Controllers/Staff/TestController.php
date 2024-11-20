<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function cetak(){
        $pdf = Pdf::loadView('staff-pages.admin.surat.undangan-rapat');

        // Opsional: Set paper size dan orientation
        $pdf->setPaper('A4', 'portrait');

        // Download PDF dengan nama file
        return $pdf->download('surat_undangan.pdf');
    }
}
