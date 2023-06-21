@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
    <h1 class="h2">Tiket anda</h1>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Informasi Tiket</h5>
      <ul class="list-group">
        <li class="list-group-item"><strong>Kode Antrian:</strong> {{ $tiket->antrian }}</li>
        <li class="list-group-item"><strong>Kode Poli:</strong> {{ $tiket->kode_poli }}</li>
        <li class="list-group-item"><strong>Nama Pasien:</strong> {{ $tiket->name }}</li>
      </ul>
    </div>
  </div>
  <div class="container my-5">
    @if ($status !== true)
      <h5>Silahkan tunggu ....</h5>
    @else
      <h5>Silahkan anda menuju ke poli {{ $tiket->kode_poli }}</h5>
    @endif
  </div>
@endsection
