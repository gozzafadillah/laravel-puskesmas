<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\P_Pelayanan;
use App\Models\Poli;
use App\Models\RekamMedis;
use App\Models\User;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{

    public function getRekamMedis()
    {
        $NIKPasien = auth()->user()->NIK;
        $dataRekammedis = Antrian::with('rekamMedis')->where('NIK', $NIKPasien)->paginate(7);

        return view('dashboard.rekammedis.logRekammedis', [
            'rekamMedis' => $dataRekammedis
        ]);
    }

    public function showPasien()
    {
        $session = auth()->user();
        $dokter = Dokter::where('userid', '=', $session->id)->value("id");
        $poli =  Poli::where('dokter', '=', $dokter)->first();
        $pasien = Antrian::where('kode_poli', '=', $poli->kode_poli)->orderBy("created_at", "desc")->paginate(5);

        return view('dashboard.rekammedis.listpasien', [
            "pasien" => $pasien,
            "poli" => $poli
        ]);
    }

    public function getRekamMedisByKode($kodeAntrian)
    {
        $dataRekammedis = RekamMedis::with('resepObat')->where('antrian', $kodeAntrian)->first();
        if ($dataRekammedis == null) {
            $dataRekammedis = RekamMedis::with('resepObat')->where('antrian', $kodeAntrian)->first();
        }
        $p_pelayanan = P_Pelayanan::latest()->get();

        return view('dashboard.dokter.showPasien', [
            'data' => $dataRekammedis,
            'p_pelayanan' => $p_pelayanan
        ]);
    }

    public function storeRekamMedis(Request $request)
    {

        $validatedData = $request->validate([
            'anamnesa' => 'required',
            'pemeriksaan_Fisik' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
        ]);

        $validatedData['antrian'] = $request->kode_antrian;
        $validatedData['kode_rekammedis'] = $this->generateKode($request->kode_antrian);

        if ($request['bpjs']) {
            $validatedData['bpjs'] = $request['bpjs'];
        }


        RekamMedis::create($validatedData);

        return redirect("/dashboard/pelayanan/form/" . $validatedData['kode_rekammedis'] . "?tindakan=" . $validatedData['tindakan']);
    }

    public function createRekamMedis($kode)
    {
        $antrian = Antrian::where('kode_antrian', $kode)->first();
        $user = User::where("NIK", $antrian['NIK'])->first();

        return view("dashboard/rekammedis/formRekamMedis", [
            'antrian' => $antrian,
            'user' => $user
        ]);
    }


    function generateKode($kodeAntrian)
    {
        // Mendapatkan waktu saat ini dalam format Unix
        $currentUnixTime = time();
        // Mengonversi waktu Unix ke tipe data string
        $currentUnixTime = strval($currentUnixTime);
        return $kodeAntrian . "-" . $currentUnixTime;
    }
}
