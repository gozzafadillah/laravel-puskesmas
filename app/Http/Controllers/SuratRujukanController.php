<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\RekamMedis;
use App\Models\SuratRujukan;
use Illuminate\Http\Request;

class SuratRujukanController extends Controller
{
    public function index()
    {
        return view(
            'dashboard.rujukan.index',
            [
                'pasien' => SuratRujukan::latest()->get(),
            ]
        );
    }
    public function createSuratRujukan($kodeAntrian)
    {
        return view("dashboard.rujukan.formRujukan", [
            'kode' => $kodeAntrian,
        ]);
    }

    public function storeSuratRujukan(Request $request)
    {

        $validatedData = $request->validate([
            'fasilitas' => 'required',
            'rencana_tindak_lanjut' => 'required',
        ]);

        if ($request->kode_rekammedis) {
            $validatedData['kode_rekammedis'] = $request->kode_rekammedis;
        }

        SuratRujukan::create($validatedData);

        $this->changeStatusPasien($validatedData['kode_rekammedis']);

        return redirect("/dashboard/listpasien");
    }

    function changeStatusPasien($kode)
    {
        $dataRekamMedis = RekamMedis::where('kode', $kode)->first();
        $changeStatusAntrian = Antrian::where('kode_antrian', $dataRekamMedis['antrian'])->update(['status' => 1]);
        return $changeStatusAntrian;
    }
}
