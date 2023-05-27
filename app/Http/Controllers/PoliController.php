<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{
    public function index()
    {
        return view('dashboard.poli.index', [
            'data' => Poli::with("dokter")->latest()->get()
        ]);
    }

    public function show()
    {
        // 
    }

    public function create()
    {
        return view("dashboard.poli.create", [
            'title' => "Tambah Poli",
            'dokter' => Dokter::latest()->get(),
            'ruangan' => Ruangan::where('status', 0)->latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'dokter' => 'required',
            'ruangan' => 'required',
        ]);

        if ($request->isActive) {
            $validateData['isActive'] = 1;
        }


        $validateData['jadwal'] = $request->jadwalStart . " s/d " . $request->jadwalEnd;

        $validateData['kode'] = $this->generatePoliCode($validateData['name']);

        $poli = Poli::create($validateData);

        return redirect("/dashboard/poli")->with("success", "poli telah ditambahkan");
    }

    public function destroy($kode)
    {
        Poli::destroy($kode);

        return redirect("dashboard/poli")->with("success", "poli telah dihapus");
    }

    public function edit($kode)
    {
        // 
    }

    public function update(Poli $poli, $kode)
    {
        // 
    }

    function generatePoliCode($name)
    {
        // Menghilangkan kata "Poli" dari nama poli dan spasi di awal dan akhir
        $name = trim(str_ireplace('Poli', '', $name));

        // Mengambil huruf pertama dari setiap kata di dalam nama poli
        $words = explode(' ', $name);
        $prefix = '';
        foreach ($words as $word) {
            $prefix .= strtoupper(substr($word, 0, 1));
        }

        // Mengambil nomor urut dari jumlah data poli dengan prefix yang sama
        $num = str_pad(Poli::where('kode', 'like', $prefix . '%')->count() + 1, 3, '0', STR_PAD_LEFT);

        // Menggabungkan prefix dan nomor urut menjadi kode poli
        $code = $prefix . $num;

        return $code;
    }
}