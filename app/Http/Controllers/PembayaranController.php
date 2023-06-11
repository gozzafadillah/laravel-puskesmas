<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Obat;
use App\Models\ResepObat;
use App\Models\SuratRujukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('dashboard.pembayaran.index', [
            'pasien' => Antrian::with('rekamMedis')->get(),
        ]);
    }
    public function createPembayaran($kode_rekammedis)
    {
        $resepObat = ResepObat::where('kode_rekamedis', $kode_rekammedis)->first();
        $rujukan = SuratRujukan::where('kode_rekammedis', $kode_rekammedis)->first();
        $dataResepObat = DB::table('p_resep_obat')->where('kode_resep_obat', $resepObat->kode_resep_obat)->get();

        return view('dashboard.pembayaran.formPembuatanNota', [
            'pelayanan' => DB::table('pelayanan')->get(),
            'categoryPelayanan' => DB::table('category_pelayanan')->get(),
            'resepObat' => $resepObat,
            'rujukan' => $rujukan,
            'dataResepObat' => $dataResepObat,
            'obats' => Obat::get(),
        ]);
    }
    public function storePascaPembayaran(Request $request)
    {

        $layananList = $request->input('layananList');
        $kode_pasien = $request->input('kode_pasien');

        foreach ($layananList as $layanan) {
            $obatId = $layanan['id'];
            $dosis = $layanan['dosis'];
            $layanan = Obat::where('kode_obat', $obatId)->first();

            // DB::table('p_resep_obat')->insert([
            //     'kode_resep_obat' => $kode_resep_obat,
            //     'kode_obat' => $obatId,
            //     'dosis' => $dosis,
            // ]);

            // Obat::where('kode_obat', $obatId)->update(['stok' => $obatNew]);
        }
    }
}
