<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\NotaPembayaran;
use App\Models\Obat;
use App\Models\Transaksi;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmbilObatController extends Controller
{
    public function pasienAmbilObat()
    {
        $dataAntrian = Antrian::with("rekamMedis")->with("User")->get();
        $dataResepObat = RekamMedis::with('resepObat')->get();
        $notaPembayaran = NotaPembayaran::with("transaksi")->get();

        return view('dashboard.pengambilanObat.index', [
            'dataAntrian' => $dataAntrian,
            'dataResepObat' => $dataResepObat,
            'notaPembayaran' => $notaPembayaran,
        ]);
    }

    public function listObatPasien($kodeResepObat)
    {
        $p_resepObat = DB::table('p_resep_obat')->where("kode_resep_obat", $kodeResepObat)->get();
        // ddd($p_resepObat);
        return view("dashboard.pengambilanObat.listObatPasien", [
            'resepObat' => $p_resepObat,
            'obat' => Obat::get()
        ]);
    }
}
