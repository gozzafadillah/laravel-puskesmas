@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
    <h1 class="h2">Log Resep Obat</h1>
  </div>

  <div class="table-responsive">
    <table class="table-striped table">
      <thead>
        <tr>
          <th>Kode Resep Obat</th>
          <th>Tanggal Dibuat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rekamMedis as $data)
          @if ($data->rekamMedis->resepObat && $data->rekamMedis->resepObat != null)
            <tr>
              <td>{{ $data->rekamMedis->resepObat->kode_resep_obat }}</td>
              <td>
                {{ \Carbon\Carbon::parse($data->rekamMedis->resepObat->created_at)->setTimezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}
              </td>
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
