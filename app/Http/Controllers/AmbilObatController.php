<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\NotaPembayaran;
use App\Models\Obat;
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

    public function changeStatus($resepObat)
    {
        ResepObat::where('kode_resep_obat', $resepObat)->update(['status' => 1]);
        return redirect('/dashboard/pasienObat');
    }

    public function listObatPasien($kodeResepObat)
    {
        $p_resepObat = DB::table('p_resep_obat')->where("kode_resep_obat", $kodeResepObat)->get();
        // ddd($p_resepObat);
        return view("dashboard.pengambilanObat.listObatPasien", [
            'resepObat' => $p_resepObat,
            'kodeResepObat' => $kodeResepObat,
            'obat' => Obat::get()
        ]);
    }

    public function updateObat($kodeResepObat)
    {
        $p_obat = DB::table('p_resep_obat')->where('kode_obat', $kodeResepObat)->first();
        $obatOld = Obat::where('kode_obat', $p_obat->kode_obat)->first();
        if ($obatOld) {
            if ($obatOld->stok < $p_obat->qty) {
                return redirect("/dashboard/ambilObat/" . $p_obat->kode_resep_obat)->with("error", 'Stok Obat Habis');
            }
            $newStok = $obatOld->stok - $p_obat->qty;
            Obat::where('kode_obat', $kodeResepObat)->update(['stok' => $newStok]);
            DB::table('p_resep_obat')->where('kode_obat', $kodeResepObat)->update(['status' => 1]);
        }

        return redirect("/dashboard/ambilObat/" . $p_obat->kode_resep_obat)->with('success', 'Obat ' . $obatOld->nama_obat . 'telah success diambil');
    }
}
