<?php

namespace App\Http\Controllers;

use App\Models\KomikModel;
use App\Models\PenyewaandetailModel;
use App\Models\PenyewaanModel;
use Dompdf\Dompdf;
use Dompdf\Options;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PdfController extends Controller
{
    public function cetak_pdf()
    {
        // Fetch data from database
        $data['penyewaandetail'] = PenyewaandetailModel::orderBy('id', 'desc')->paginate(5);

        // Create PDF instance
        $pdf = new Dompdf();

        // Load HTML content (Blade view)
        $html = view('pages.penyewaandetail.pdf', $data)->render();
        $pdf->loadHtml($html);

        // (Optional) Set options for PDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $pdf->setOptions($options);

        // Render PDF (streaming to browser)
        $pdf->render();

        // Stream the generated PDF to the browser
        return $pdf->stream('detail.pdf');
    }

    public function cetak_komik()
    {
        // Fetch data from database
        $data['komik'] = KomikModel::orderBy('id', 'desc')->paginate(5);

        // Create PDF instance
        $pdf = new Dompdf();

        // Load HTML content (Blade view)
        $html = view('pages.komik.pdf', $data)->render();
        $pdf->loadHtml($html);

        // (Optional) Set options for PDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $pdf->setOptions($options);

        // Render PDF (streaming to browser)
        $pdf->render();

        // Stream the generated PDF to the browser
        return $pdf->stream('komik.pdf');
    }

    public function cetak_penyewaan()
    {
         // Fetch data from database
         $data['penyewaan'] = PenyewaanModel::orderBy('id', 'desc')->paginate(5);

         // Create PDF instance
         $pdf = new Dompdf();

         // Load HTML content (Blade view)
         $html = view('pages.penyewaan.pdf', $data)->render();
         $pdf->loadHtml($html);

         // (Optional) Set options for PDF
         $options = new Options();
         $options->set('defaultFont', 'Arial');
         $pdf->setOptions($options);

         // Render PDF (streaming to browser)
         $pdf->render();

         // Stream the generated PDF to the browser
         return $pdf->stream('penyewaan.pdf');
    }


}
