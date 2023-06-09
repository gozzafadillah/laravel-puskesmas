<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\ObatCategory;
use App\Models\Poli;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepObatController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $dokter = Dokter::where('userid', $user)->value('id');
        $poli = Poli::where('dokter', $dokter)->value('kode_poli');
        $resepKode = ResepObat::where('kode_rekamedis', 'LIKE', $poli . '%')->latest()->get();

        return view('dashboard.resepobat.index', [
            'resepObat' => $resepKode,
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
        // memasukan data rekam medis dari parameter ke foreign key di table surat_rujukan
        $kodeRekamMedis = $request->input('kode_rekammedis');

        $obatList = $request->input('obatList');
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

        $rekamMedis = RekamMedis::where('kode_rekammedis', $kodeRekamMedis)->first();
        $cek = DB::table('antrian')->where('kode_antrian', $rekamMedis['antrian'])->update(['status' => 1]);

        return response()->json(['success' => true]);
    }

    function geneateResepKode()
    {
        $resepKode = 'resep-' . time();
        return $resepKode;
    }
}
