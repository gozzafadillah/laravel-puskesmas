@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
</div>
    
@if(auth()->user()->cek == 2)
    <div class="alert alert-danger" role="alert">
        Tunggu Petugas Verifikasi Data BPJS Kamu yaaa! Jika waktunya lebih dari 2 Jam Silahkan Hubungi Petugas! 
    </div>
@elseif(auth()->user()->cek == 0)
    <div class="alert alert-danger" role="alert">
        Kamu harus Perbaiki dan Cek Lagi Nomer BPJS Kamu di Profile, Jika Masalah berlanjut silahkan Hubungi Petugas!
    </div>
@else
    <div class="alert alert-success alert-dismissible fade show col-lg-15" role="alert">
        Data kamu terverifikasi, Silahkan Gunakan Aplikasi Puskesmas Binong!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@endsection