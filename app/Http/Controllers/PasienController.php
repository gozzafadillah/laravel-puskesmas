<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function getTiket()
    {
        $user = auth()->user();
        $tiket = Antrian::where('NIK', $user->NIK)
            ->where('status', 0)
            ->first();
        $status = $this->checkAntrianStatus($tiket);
        return view("dashboard.pasien.tiket", [
            'tiket' => $tiket,
            'status' => $status,
        ]);
    }

    function checkAntrianStatus($tiket)
    {
        $previousAntrian = DB::table('antrian')
            ->where('kode_poli', $tiket->kode_poli)
            ->where('kode_antrian', "!=", $tiket->kode_antrian)
            ->orderByRaw("SUBSTRING_INDEX(kode_antrian, '-', -1) DESC")
            ->value('status');
        if ($previousAntrian !== 1) {
            return false;
        } else {
            return true;
        }
    }
}
