@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
    <h1 class="h2">List Pasien</h1>
  </div>
  <div class="card">
    <div class="card-header">
      <h5>{{ $poli['name'] }}</h5>
    </div>
    <div class="card-body">
      <h5 class="card-title">Kode: {{ $poli['kode'] }}</h5>
      <p class="card-text">{!! $poli['description'] !!}</p>
      <p class="card-text">Ruangan: {{ $poli['ruangan'] }}</p>
      <p class="card-text">Jadwal: {{ $poli['jadwal'] }}</p>
    </div>
    <div class="card-footer">
      Status: {!! $poli['isActive']
          ? '<span class="mx-2 badge bg-success border-0">Aktif</span>'
          : '<span class="mx-2 badge bg-danger border-0">Aktif</span>' !!}
    </div>
    <div class="card-footer text-muted">
      Dibuat pada: {{ $poli['created_at'] }}
    </div>
  </div>


  <div class="table-responsive">
    <table class="table-striped table">
      <thead>
        <tr>
          <th>Kode Antrian</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Status</th>
          <th>Tanggal Dibuat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pasien as $item)
          <tr>
            <td>{{ $item['kode_antrian'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['NIK'] }}</td>
            <td>{!! $item['status'] != 1
                ? "<a href='#' class='badge bg-success border-0 text-decoration-none'>belum dicek</a>"
                : "<a href='#' class='badge bg-danger border-0 text-decoration-none'>sudah dicek</a>" !!}</td>
            <td>{{ $item['created_at'] }}</td>
            <td>
              @if ($item->status == 0)
                <a class="badge bg-primary border-0"
                  href="/dashboard/listpasien/rekammedis/form/{{ $item->kode_antrian }}"><span
                    data-feather="plus"></span></a>
              @else
                <a class="badge bg-warning border-0"
                  href="/dashboard/listpasien/rekammedis/edit/{{ $item->kode_antrian }}"><span
                    data-feather="edit"></span></a>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
