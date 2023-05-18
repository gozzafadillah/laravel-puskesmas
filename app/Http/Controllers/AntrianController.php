<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showAntrians()
    {
        $poli = Poli::where('isActive', 1)->latest()->get();
        $antrian = [];

        foreach ($poli as $poli) {
            $query = DB::table('antrian')
                ->where('kode_poli', $poli->kode)
                ->where('status', 0)
                ->orderByRaw("SUBSTRING_INDEX(kode_antrian, '-', -1) ASC")
                ->value('kode_antrian');

            $data = [
                "kode_antrian" => $query,
                "kode_poli" => $poli->kode
            ];
            array_push($antrian, $data);
        }

        return view("antrian.show", [
            'polis' => Poli::where('isActive', 1)->latest()->get(),
            'title' => 'Nomor Antrian',
            'active' => 'antrian',
            "antrian" => json_decode(json_encode($antrian), false)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => 'required',
            "NIK" => "required",
            "tgllahir" => "required",
            'kode_poli' => "required",
        ]);

        $poliKode = $validateData['kode_poli'];


        // Ambil nomor urut terakhir dari kode antrian untuk poli ini
        $lastKodeAntrian = DB::table('antrian')
            ->where('kode_poli', $poliKode)
            ->orderByRaw("SUBSTRING_INDEX(kode_antrian, '-', -1) DESC")
            ->value('kode_antrian');

        // Periksa apakah berhasil mendapatkan nomor urut terakhir
        if ($lastKodeAntrian) {
            $urutan = (int)explode('-', $lastKodeAntrian)[1] + 1;
        } else {
            // Jika tidak ada nomor urut sebelumnya, beri nomor urut awal 1
            $urutan = 1;
        }

        $validateData['kode_antrian'] = $poliKode . '-' . str_pad($urutan, 4, '0', STR_PAD_LEFT);


        // Simpan data antrian ke dalam database
        $cek = Antrian::create($validateData);

        return redirect("/antrian");
    }

    /**
     * Display the specified resource.
     */
    public function show(Antrian $antrian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antrian $antrian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Antrian $antrian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antrian $antrian)
    {
        //
    }

    public function generateKodeAntrian($kode_poli)
    {
        // Ambil nomor urut terakhir dari entri antrian untuk poli ini
        $lastUrutan = $this->antrian()->max('urutan');

        // Tingkatkan nomor urut
        $urutan = $lastUrutan ? $lastUrutan + 1 : 1;

        // Buat kode antrian dengan format yang diinginkan
        $kodeAntrian = $kode_poli . '-' . str_pad($urutan, 4, '0', STR_PAD_LEFT);

        return $kodeAntrian;
    }
}
