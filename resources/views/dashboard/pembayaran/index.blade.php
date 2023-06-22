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
            <th scope="col">Nomer</th>
            <th scope="col">Date</th>
            <th scope="col">Nama </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="search-results">
          @foreach ($pasien as $user)
            @foreach ($notaPembayaran as $pembayaran)
              @if ($user->resepObat->kode_resep_obat === $pembayaran->kode_resepobat && $pembayaran->transaksi->status !== 'Settled')
                <tr>
                  <td>{{ $user->dataAntrian->antrian }}</td>
                  <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                  <td>{{ $user->dataAntrian->name }}</td>
                  <td>
                    <div class="d-flex">
                      <a class="badge bg-warning m-1 border-0"
                        href="/dashboard/pembayaran/form/{{ $user->kode_rekammedis }}"><span
                          data-feather="dollar-sign"></span></a>
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
