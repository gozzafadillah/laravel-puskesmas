<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use App\Models\SuratRujukan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $antrian = Antrian::with('rekamMedis')->get();
        ddd($antrian[2]->rekamMedis->suratRujukan);
        return view('dashboard.pembayaran.index', [
            'resepObat' => ResepObat::latest()->get(),
            'suratRujukan' => SuratRujukan::latest()->get(),
        ]);
    }
}
