<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        return view('dashboard.poli.index', [
            'data' => Poli::latest()->get()
        ]);
    }

    public function show()
    {
        // 
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        // 
    }

    public function destroy($kode)
    {
        // 
    }

    public function edit($kode)
    {
        // 
    }

    public function update(Poli $poli, $kode)
    {
        // 
    }
}
