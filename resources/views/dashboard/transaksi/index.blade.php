@extends('dashboard.layouts.main')

@section('container')
  <div class="row">
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
      <h1 class="h2">Transaksi Users Pasien</h1>
    </div>

    <div class="table-responsive col-lg-6">
      <div class="row">
        <div class="col-md-6">
          <form id="search-form" onkeypress="return event.keyCode !== 13;" action="{{ route('listUser') }}" method="GET">
            @csrf
            <div class="input-group mb-3">
              <input autocomplete="off" type="text" name="search" class="form-control"
                placeholder="Cari NIK / Nama .." id="search-input">
              <button type="submit" class="btn btn-primary"> <span data-feather="search"
                  class="align-text-bottom"></span></button>
            </div>
          </form>
        </div>
      </div>


      @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
          {{ session('status') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <table class="table-striped table-sm table">
        <thead>
          <tr>
            <th scope="col">Nomer</th>
            <th scope="col">Date</th>
            <th scope="col">status </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="search-results">
          @foreach ($listTransaksi as $transaksi)
            @foreach ($notaPembayaran as $user)
              @if ($transaksi->kode_notapembayaran == $user->kode_notapembayaran)
                <tr>
                  <td>{{ $user->kode_notapembayaran }}</td>
                  <td>{{ $user->created_at }}</td>
                  <td>
                    @if ($transaksi->status == 'Pending')
                      <a style="text-decoration: none" class="badge bg-primary border-0">Pending</a>
                    @endif
                    @if ($transaksi->status == 'Settled')
                      <a style="text-decoration: none" class="badge bg-success border-0">Settled</a>
                    @endif
                    @if ($transaksi->status == 'Failed')
                      <a style="text-decoration: none" class="badge bg-danger border-0">Failed</a>
                    @endif
                  </td>
                  {{-- <td>{{ $user->created_at }}</td> --}}
                  {{-- <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
              <td>{{ $user->dataAntrian->name }}</td> --}}
                  <td>
                    <div class="d-flex gap-2">
                      <form action="/dashboard/transaksi/{{ $transaksi->invoice }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" style="text-decoration: none"
                          class="badge bg-success border-0">Bayar</button>
                      </form>
                      <a class="badge bg-primary border-0" style="text-decoration: none"
                        href="/dashboard/transaksi/{{ $user->kode_notapembayaran }}"><span data-feather="eye"></span></a>
                    </div>
                  </td>
                </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
