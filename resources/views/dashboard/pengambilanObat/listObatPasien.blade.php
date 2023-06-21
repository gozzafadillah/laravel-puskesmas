@extends('dashboard.layouts.main')

@section('container')
  <!-- card pelayanan -->
  <div class="card mt-4">
    <div class="card-header">
      List Pengambilan Obat
    </div>
    <div class="card-body">
      @foreach ($resepObat as $obat)
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $obat->kode_resep_obat }}
            </h5>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
