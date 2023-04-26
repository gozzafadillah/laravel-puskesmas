<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class TambahObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $obats = Obat::where('nama_obat', 'like', '%'.$search.'%')
                  ->orWhere('kode_obat', 'like', '%'.$search.'%')
                  ->get();
        // return view('dashboard.tambahobat.create', compact('obats'), [
        //     'obats' => Obat::all()
        // ]);
         return view('dashboard.tambahobat.create', compact('obats'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tambahobat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_obat' => 'required|unique:obats',
            'nama_obat' => 'required',
            'kategori_obat' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        Obat::create($validatedData);
        return redirect('/dashboard/tambahobat')->with('status', 'Obat Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        return view('dashboard.tambahobat.create', [
            'obats' => $obat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return view('dashboard.tambahobat.create', [
            'obat' => $obat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $rules = [
            'nama_obat' => 'required',
            'kategori_obat' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ];

        

        $validatedData = $request->validate($rules);
        // @ddd();
        Obat::where('kode_obat', $request->kode_obat)
            ->update($validatedData);

        return redirect('/dashboard/tambahobat')->with('status', 'Postingan Berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Obat $obat)
    {
        // dd($request->kode_obat);
        Obat::destroy($request->kode_obat);

        return redirect('/dashboard/tambahobat')->with('status', 'Obat Berhasil dihapus!');
    }
}