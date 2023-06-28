@extends('dashboard.layouts.main')

@section('container')
  <div class="row">
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
      <h1 class="h2">Pembayaran Users Pasien</h1>
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
            <th scope="col">Invoice</th>
            <th scope="col">Date</th>
            <th scope="col">Pembayaran </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="search-results">
          @foreach ($notaPembayaran as $pasien)
            @if ($pasien->transaksi && $pasien->transaksi->invoice != null && $pasien->kode_resepobat != null)
              <tr>
                <td>{{ $pasien->transaksi->invoice }}</td>
                <td>
                  {{ \Carbon\Carbon::parse($pasien->transaksi->created_at)->setTimezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}
                </td>
                <td>{{ $pasien->transaksi->status }}</td>
                @if ($pasien->resepObat->status == 0)
                  <td>
                    <div class="d-flex">
                      <a class="btn btn-primary {{ $pasien->resepObat->notaPembayaran->transaksi->status == 'Settled' ? '' : 'disabled' }}"
                        href="/dashboard/ambilObat/{{ $pasien->kode_resepobat }}" role="button"
                        aria-disabled="{{ $pasien->resepObat->notaPembayaran->transaksi->status == 'Settled' ? 'false' : 'true' }}"><span
                          data-feather="eye"></span></a>
                    </div>
                  </td>
                @else
                  <td>
                    <button style="cursor: default" class="badge bg-success border-0">done</button>
                  </td>
                @endif
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @include('dashboard.layouts.modalPasien')


  {{-- <script type="text/javascript">
    $(document).ready(function() {
      var typingTimer;
      var doneTypingInterval = 200;

      $('#search-input').on('keyup', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
      });

      function doneTyping() {
        var query = $('#search-input').val();

        $.get('{{ route('listUser') }}', {
          query: query
        }, function(data) {
          $('#search-results').html(data);
          feather.replace();
        });
      }

      $('#search-form').on('submit', function(event) {
        event.preventDefault();
        doneTyping();
      });
    });

    function showData(nik) {
      $.ajax({
        url: '/dashboard/daftarpasien/' + nik,
        method: 'GET',
        beforeSend: function() {
          // show loading animation before the request is sent
          $('#exampleModal #modal-body').html(
            '<div class="text-center"><p>Tunggu Sebentar...</p></div>');
        },
        success: function(response) {
          // hide the loading animation and display the data
          $('#exampleModal #modal-body').html(response);
        },
        error: function(xhr) {
          alert('Terjadi kesalahan saat memuat data.');
        }
      });

      // show the modal after the request is sent
      $('#exampleModal').modal('show');
    }

    function deleteData(id, key) {
      let row = $('tr[data-id="' + key + '"]');


      $.ajax({
        url: '/dashboard/tambahacategoryobat/delete/' + id,
        type: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}',
        },
        success: function(result) {
          row.fadeOut('slow', function() {
            $(this).remove();
          });
          alert(result.message + ' = ' + key);
          location.reload();
        },
        error: function(xhr, status, error) {
          alert(xhr.responseText);
        }
      });
    }
  </script> --}}
@endsection
