@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pb-2 pt-3">
    <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
  </div>

  @if (auth()->user()->cek == 2)
    <div class="alert alert-danger" role="alert">
      @if (auth()->user()->bpjs != null)
        Tunggu Petugas Verifikasi Data BPJS Kamu yaaa! Jika waktunya lebih dari 2 Jam Silahkan Hubungi Petugas!
      @else
        Silahkan Verifikasi Email Anda!
      @endif
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

  <div class="container mt-5">
    <div class="row">
      <div class="col-sm-4">
        <div class="card bg-primary text-light">
          <div class="card-body">
            <h5 class="card-title">Rekam Medis</h5>
            <?php
            $dataAntrian = [];
            foreach ($antrian as $value) {
                array_push($dataAntrian, $value->rekamMedis);
            }
            ?>
            <h5 class="card-text text-center">{{ count($dataAntrian) }}</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card bg-success text-light">
          <div class="card-body">
            <h5 class="card-title">Surat Rujukan</h5>
            <?php
            $suratRujukan = 0;
            foreach ($dataAntrian as $value) {
                if ($value->suratRujukan) {
                    $suratRujukan++;
                }
            }
            ?>
            <h5 class="card-text text-center">{{ $suratRujukan }}</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card bg-danger text-light">
          <div class="card-body">
            <h5 class="card-title">Resep Obat</h5>
            <?php
            $resepObat = 0;
            foreach ($dataAntrian as $value) {
                if ($value->resepObat) {
                    $resepObat++;
                }
            }
            
            ?>


            <h5 class="card-text text-center">{{ $resepObat }}</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
