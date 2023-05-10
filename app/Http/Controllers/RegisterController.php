<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Hash; //fitur enskripsi laravel

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|Min:3|Max:255',
            'NIK' => 'required|unique:users|Min:16|Max:255',
            'alamat' => 'required|Min:3|Max:255',
            'kepalakeluarga' => 'required|Min:3|Max:255',
            'opsibpjs' => 'required',
            'is_admin' => 'required',
            'cek' => 'required',
            'bpjs' => ($request->input('opsibpjs') === 'YA') ? 'required|unique:users,bpjs' : 'nullable',
            'username' => 'required|Min:3|Max:255|unique:users',
            'email' => 'required|unique:users',
            'password' => 'nullable|min:6|required_with:confirm_password|same:confirm_password',
            'tgllahir' => 'required|date'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        // $validateData['password'] = Hash::make($validateData['password']); //fitur enskripsi laravel

        // check dia punya bpjs atau tidak
        if ($validateData['bpjs'] == null) {
            $validateData['cek'] = 1;
        }

        // Hitung umur dari tanggal lahir
        $tgllahir = new DateTime($validateData['tgllahir']);
        $today = new DateTime('today');
        $age = $tgllahir->diff($today)->y;

        // Tambahkan umur ke data yang akan disimpan ke database
        $validateData['age'] = $age;

        // ddd($validateData);

        User::create($validateData);

        // dd('Registrasi Berhasil'); //ngecek data udah masuk apa blom
        return redirect('/login')->with('status', 'Akun Anda Berhasil di Buat, Silahkan Login');
    }
}
