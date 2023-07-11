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
      <h5 class="card-title">Kode: {{ $poli['kode_poli'] }}</h5>
      <p class="card-text">{!! $poli['description'] !!}</p>
      <p class="card-text">Ruangan: {{ $poli['ruangan'] }}</p>
      <p class="card-text">Jadwal: {{ $poli['jadwal'] }}</p>
    </div>
    <div class="card-footer">
      Status: {!! $poli['isActive']
          ? '<span class="mx-2 badge bg-success border-0">Aktif</span>'
          : '<span class="mx-2 badge bg-danger border-0">Nonaktif</span>' !!}
    </div>
    <div class="card-footer text-muted">
      <p id="tanggal"></p>
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
        @php
          $isDisabled = true; // Mengatur isDisabled menjadi true pada awal iterasi
        @endphp
        @foreach ($pasien->sortByDesc('kode_antrian') as $item)
          <tr>
            <td>{{ $item['kode_antrian'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['NIK'] }}</td>
            <td>{!! $item['status'] != 1
                ? "<a href='#' class='badge bg-success border-0 text-decoration-none'>belum dicek</a>"
                : "<a href='#' class='badge bg-danger border-0 text-decoration-none'>sudah dicek</a>" !!}</td>
            <td>{{ \Carbon\Carbon::parse($item['created_at'])->setTimezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}</td>
            <td style="display:flex; flex-direction: row; gap: 10px;">
              @if ($item['status'] == 0)
                @if ($isDisabled)
                  <span class="badge bg-primary disabled border-0" role="button" aria-disabled="true"><span
                      data-feather="plus"></span></span>
                @else
                  <a class="badge bg-primary border-0" role="button"
                    href="/dashboard/listpasien/rekammedis/form/{{ $item['kode_antrian'] }}"><span
                      data-feather="plus"></span></a>
                  @php
                    $isDisabled = true; // tombol terbuka, variabel diubah menjadi true agar tombol selanjutnya dinonaktifkan
                  @endphp
                @endif
              @else
                <a href="/dashboard/listpasien/{{ $item['kode_antrian'] }}" class="badge bg-success border-0"><span
                    data-feather="eye"></span></a>
                <a class="badge bg-warning border-0"
                  href="/dashboard/listpasien/rekammedis/edit/{{ $item['kode_antrian'] }}"><span
                    data-feather="edit"></span></a>
              @endif
              @if ($item['status'] == 0)
                <form action="/dashboard/tiket/{{ $item['kode_antrian'] }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="badge bg-danger border-0"
                    onclick="return confirm('Are you sure you want to delete antrian?')"><span
                      data-feather="trash"></span></button>
                </form>
              @endif
            </td>
          </tr>
          @php
            $isDisabled = false; // Mengatur isDisabled menjadi false setelah tombol ditampilkan
          @endphp
        @endforeach
      </tbody>

    </table>
    <div class="my-5">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          {{ $pasien->links() }}
        </ul>
      </nav>
    </div>
  </div>
  <script>
    let currentDate = new Date();
    let formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1) + '-' + currentDate.getDate();
    document.getElementById('tanggal').innerHTML = `Tanggal Pengambilan Poli: ${formattedDate}`;
  </script>
@endsection
