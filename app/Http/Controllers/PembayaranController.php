<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\P_Pelayanan;
use App\Models\Pelayanan;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use App\Models\SuratRujukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        // ddd(RekamMedis::with('antrian')->get());
        return view('dashboard.pembayaran.index', [
            'pasien' => RekamMedis::with('dataAntrian')->get(),
        ]);
    }
    public function createPembayaran($kode_rekammedis)
    {
        $resepObat = ResepObat::where('kode_rekamedis', $kode_rekammedis)->first();
        $rujukan = SuratRujukan::where('kode_rekammedis', $kode_rekammedis)->first();
        $dataResepObat = DB::table('p_resep_obat')->where('kode_resep_obat', $resepObat->kode_resep_obat)->get();

        return view('dashboard.pembayaran.formPembuatanNota', [
            'pelayanan' => Pelayanan::latest()->get(),
            'resepObat' => $resepObat,
            'rujukan' => $rujukan,
            'dataResepObat' => $dataResepObat,
            'obats' => Obat::get(),
            'pelayananUser' => P_Pelayanan::where('kode_rekammedis', $kode_rekammedis)->get()
        ]);
    }
    public function storePascaPembayaran(Request $request)
    {
        //    
    }
}
