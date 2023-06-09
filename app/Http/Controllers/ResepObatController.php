<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Obat;
use App\Models\ObatCategory;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepObatController extends Controller
{
    public function index()
    {
        return view('dashboard.resepobat.index', [
            'resepObat' => ResepObat::latest()->get(),
        ]);
    }
    public function createResepObat($kodeRekamMedis)
    {
        return view(
            "dashboard.resepobat.formResepObat",
            [
                'kode_rekamedis' => $kodeRekamMedis,
                'obat' => ObatCategory::with('obat')->latest()->get(),
            ]
        );
    }

    public function storeResepObat(Request $request)
    {

        $obatList = $request->input('obatList');
        $kodeRekamMedis = $request->input('kode_rekammedis');
        $kode_resep_obat = $this->geneateResepKode();
        $errorMessages = [];
        foreach ($obatList as $obat) {
            $obatId = $obat['id'];
            $dosis = $obat['dosis'];
            $obat = Obat::where('kode_obat', $obatId)->first();
            if ($obat['stok'] <= $dosis) {
                $errorMessages[] = 'Dosis obat ' . $obat->nama_obat . ' melebihi stok yang tersedia.';
            };
            // Jika terdapat pesan kesalahan, kirimkan respons error
            if (!empty($errorMessages)) {
                return response()->json(['errors' => $errorMessages], 422);
            }
        }
        foreach ($obatList as $obat) {
            $obatId = $obat['id'];
            $dosis = $obat['dosis'];
            $obat = Obat::where('kode_obat', $obatId)->first();
            $obatNew = $obat['stok'] - $dosis;

            DB::table('p_resep_obat')->insert([
                'kode_resep_obat' => $kode_resep_obat,
                'kode_obat' => $obatId,
                'dosis' => $dosis,
            ]);

            Obat::where('kode_obat', $obatId)->update(['stok' => $obatNew]);
        }

        ResepObat::create([
            'kode_resep_obat' => $kode_resep_obat,
            'kode_rekamedis' => $kodeRekamMedis,
        ]);

        $rekamMedis = RekamMedis::where('kode', $kodeRekamMedis)->first();
        $cek = DB::table('antrian')->where('kode_antrian', $rekamMedis['antrian'])->update(['status' => 1]);

        return response()->json(['success' => true]);
    }

    function geneateResepKode()
    {
        $resepKode = 'resep-' . time();
        return $resepKode;
    }
}
