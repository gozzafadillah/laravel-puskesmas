<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\RekamMedis;
use App\Models\SuratRujukan;
use Illuminate\Http\Request;

class SuratRujukanController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        $dokter = Dokter::where('userid', $user)->value('id');
        $poli = Poli::where('dokter', $dokter)->value('kode_poli');
        $suratRujukan = SuratRujukan::where('kode_rekammedis', 'LIKE', $poli . '%')->latest()->get();
        return view(
            'dashboard.rujukan.index',
            [
                'pasien' => $suratRujukan,
            ]
        );
    }

    public function getSuratRujukan()
    {
        $userSession = auth()->user();
        $rekamMedis = Antrian::with('rekamMedis')->where('NIK', $userSession->NIK)->get();
        return view("dashboard.rujukan.logSuratRujukan", [
            'rekamMedis' => $rekamMedis
        ]);
    }

    public function createSuratRujukan($kodeRekamMedis)
    {
        return view("dashboard.rujukan.formRujukan", [
            'kode_rekammedis' => $kodeRekamMedis,
        ]);
    }

    public function storeSuratRujukan(Request $request)
    {

        $validatedData = $request->validate([
            'fasilitas' => 'required',
            'rencana_tindak_lanjut' => 'required',
        ]);

        if ($request->kode_rekammedis) {
            // memasukan data rekam medis dari parameter ke foreign key di table surat_rujukan
            $validatedData['kode_rekammedis'] = $request->kode_rekammedis;
        }

        $validatedData['kode_rujukan'] = $this->geneateRujukanKode();

        SuratRujukan::create($validatedData);

        $this->changeStatusPasien($validatedData['kode_rekammedis']);

        return redirect("/dashboard/listpasien");
    }

    // $kode berdasarkan kode_rekammedis
    function changeStatusPasien($kode)
    {
        $dataRekamMedis = RekamMedis::where('kode_rekammedis', $kode)->first();
        $changeStatusAntrian = Antrian::where('kode_antrian', $dataRekamMedis['antrian'])->update(['status' => 1]);
        return $changeStatusAntrian;
    }

    function geneateRujukanKode()
    {
        $resepKode = 'rujukan-' . time();
        return $resepKode;
    }
}
