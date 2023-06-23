@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
    <h1 class="h2">Pengambilan Obat</h1>
  </div>
  @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <!-- card pelayanan -->
  <div class="card mt-4">
    <div class="card-header">
      List Pengambilan Obat
    </div>
    <div class="card-body">
      @foreach ($resepObat as $resep)
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $resep->kode_resep_obat }}
            </h5>
            @foreach ($obat as $obat_resep)
              @if ($obat_resep->kode_obat == $resep->kode_obat)
                <p>Nama Obat : {{ $obat_resep->nama_obat }}</p>
                <p>Stok yang diambil : {{ $resep->qty }}</p>
                @if ($resep->status !== 1)
                  <p>Stok yang tersedia : {{ $obat_resep->stok }}</p>
                @endif
                <p style="font-weight: bold">Dosis : {{ $resep->dosis }}</p>
              @endif
            @endforeach
            @if ($resep->status !== 1)
              <form method="post" action="/dashboard/ambilObat/obat/{{ $resep->kode_obat }}">
                @csrf
                @method('put')
                <button class="btn btn-success btn-sm"> <span data-feather="check-circle"
                    class="align-text-bottom"></span></button>
              </form>
            @else
              <h3 class="text-center">Obat Telah Diambil</h3>
            @endif
          </div>
        </div>
        <form action="/dashboard/ambilobat/s/{{ $resep->kode_resep_obat }}" method="post">
          @csrf
          @method('put')
          <button type="submit">Selesai</button>
        </form>
    </div>
    @endforeach
  </div>
@endsection
