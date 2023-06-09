<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\RekamMedis;
use App\Models\User;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function showPasien()
    {
        $session = auth()->user();
        $dokter = Dokter::where('userid', '=', $session->id)->value("id");
        $poli =  Poli::where('dokter', '=', $dokter)->first();
        $pasien = Antrian::where('kode_poli', '=', $poli->kode_poli)->orderBy("kode_antrian")->get();

        return view('dashboard.rekammedis.listpasien', [
            "pasien" => $pasien,
            "poli" => $poli
        ]);
    }

    public function storeRekamMedis(Request $request)
    {

        $validatedData = $request->validate([
            'antrian' => 'required',
            'anamnesa' => 'required',
            'pemeriksaan_Fisik' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'giz' => 'required'
        ]);


        $validatedData['kode_rekammedis'] = $this->generateKode($validatedData['antrian']);

        if ($request['bpjs']) {
            $validatedData['bpjs'] = $request['bpjs'];
        }


        RekamMedis::create($validatedData);

        if ($validatedData['tindakan'] != "surat-rujukan") {
            return redirect("/dashboard/resepobat/form/" . $validatedData['kode_rekammedis']);
        } else {
            return redirect("/dashboard/suratrujukan/form/" . $validatedData['kode_rekammedis']);
        }
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
