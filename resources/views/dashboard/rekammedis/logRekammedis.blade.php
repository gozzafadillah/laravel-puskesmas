@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
    <h1 class="h2">Log Rekam Medis</h1>
  </div>

  <div class="table-responsive">
    <table class="table-striped table">
      <thead>
        <tr>
          <th>Kode Rekam Medis</th>
          <th>Tanggal Dibuat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rekamMedis as $data)
          @if ($data->rekamMedis)
            <tr>
              <td>{{ $data->rekamMedis->kode_rekammedis }}</td>
              <td>{{ $data->rekamMedis->created_at }}</td>
              <td>
                <a class="badge bg-primary border-0" href="#"><span data-feather="eye"></span></a>
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
