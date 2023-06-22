<?php

namespace App\Http\Controllers;

use App\Models\NotaPembayaran;
use App\Models\Obat;
use App\Models\P_Pelayanan;
use App\Models\Pelayanan;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use App\Models\SuratRujukan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function listAntrianPembayaran()
    {
        return view('dashboard.pembayaran.index', [
            'pasien' => RekamMedis::with('dataAntrian')->with('resepObat')->get(),
            'notaPembayaran' => NotaPembayaran::with('transaksi')->latest()->get(),
        ]);
    }
    public function createPembayaran($kode_rekammedis)
    {
        $resepObat = ResepObat::where('kode_rekamedis', $kode_rekammedis)->first();
        $rujukan = SuratRujukan::where('kode_rekammedis', $kode_rekammedis)->first();
        $dataResepObat = DB::table('p_resep_obat')->where('kode_resep_obat', $resepObat->kode_resep_obat)->get();
        $pelayananUser = P_Pelayanan::where('kode_rekammedis', $kode_rekammedis)->get();
        return view('dashboard.pembayaran.formPembuatanNota', [
            'pelayanan' => Pelayanan::latest()->get(),
            'resepObat' => $resepObat,
            'rujukan' => $rujukan,
            'dataResepObat' => $dataResepObat,
            'obats' => Obat::get(),
            'pelayananUser' => $pelayananUser
        ]);
    }
    public function storeNotaPembayaran(Request $request)
    {
        $kode_notapembayaran = $this->generatePembayaran();
        $data = [
            'kode_resepobat' => $request->kode_resepobat,
            'kode_rujukan' => $request->kode_rujukan,
            'total' => $request->total,
            'kode_notapembayaran' => $kode_notapembayaran
        ];

        $invoice = [
            'invoice' => $this->generateInvoice(),
            'kode_notapembayaran' => $kode_notapembayaran,
            'total' => $request->total,
            'status' => 'Pending',
        ];

        NotaPembayaran::create($data);
        Transaksi::create($invoice);

        return redirect("/dashboard/transaksi");
    }

    public function getTransaction($kodeNotaPembayaran)
    {
        $notaPembayaran = NotaPembayaran::where('kode_notapembayaran', $kodeNotaPembayaran)->first();
        $transaksi = Transaksi::where('kode_notapembayaran', $kodeNotaPembayaran)->first();

        return view('dashboard.transaksi.showPembayaran', [
            'notaPembayaran' => $notaPembayaran,
            'transaksi' => $transaksi
        ]);
    }

    public function successTransaction($kodeInvoice)
    {
        $transaksi = Transaksi::where("invoice", $kodeInvoice)->value('status');
        if ($transaksi !== "Settled") {
            Transaksi::where("invoice", $kodeInvoice)->update(['status' => "Settled"]);
        }

        return redirect("/dashboard/transaksi");
    }

    public function listTransaksi()
    {
        return view('dashboard.transaksi.index', [
            'notaPembayaran' => NotaPembayaran::latest()->get(),
            "listTransaksi" => Transaksi::latest()->get(),
        ]);
    }

    function generateInvoice()
    {
        $kode = "invoice-" . time();
        return $kode;
    }

    function generatePembayaran()
    {
        $kode = "pembayaran-" . time();
        return $kode;
    }
}
