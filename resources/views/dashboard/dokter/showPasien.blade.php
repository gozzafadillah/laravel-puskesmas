@extends('dashboard.layouts.main')

@section('container')
  <div class="container my-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            Detail Rekam Medis
          </div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <th>Kode Rekam Medis</th>
                  <td>{{ $data->kode_rekammedis }}</td>
                </tr>
                <tr>
                  <th>Anamnesa</th>
                  <td>{{ $data->anamnesa }}</td>
                </tr>
                <tr>
                  <th>Pemeriksaan Fisik</th>
                  <td>{{ $data->pemeriksaan_fisik }}</td>
                </tr>
                <tr>
                  <th>Diagnosa</th>
                  <td>{{ $data->diagnosa }}</td>
                </tr>
                <tr>
                  <th>Tindakan</th>
                  <td>{{ $data->tindakan }}</td>
                </tr>
                <tr>
                  <th>GIZ</th>
                  <td>{{ $data->giz }}</td>
                </tr>
                <tr>
                  <th>GIZ</th>
                  <td>{{ $data }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
