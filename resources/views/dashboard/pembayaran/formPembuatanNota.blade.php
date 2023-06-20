@extends('dashboard.layouts.main')

@section('container')
  <style>
    .table-custom {
      /* Set lebar tabel menjadi 100% */
      table-layout: fixed;
      /* Tetapkan layout tabel ke "fixed" */
    }

    .table-custom th,
    .table-custom td {
      width: auto;
      /* Set lebar kolom menjadi otomatis */
      overflow-wrap: break-word;
      /* Pecah kata jika terlalu panjang */
    }
  </style>

  <head>
    <!-- Tag-tag lainnya -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <div class="row my-5">
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
      <h1 class="h2">Form Pembayaran Pasien</h1>
    </div>
    <div class="table-responsive">
      <form id="tambahNotaPembayaran" action="/dashboard/resepobat" method="POST">
        @csrf
        <!-- card pelayanan -->
        <div class="card mt-4">
          <div class="card-header">
            History Pelayanan
          </div>
          <div class="card-body">
            @foreach ($pelayananUser as $userItem)
              <div class="card mb-3">
                <div class="card-body">
                  @foreach ($pelayanan as $layanan)
                    @if ($layanan->id == $userItem->pelayanan_id)
                      <h5 class="card-title">{{ $layanan->layanan }}</h5>
                    @endif
                  @endforeach
                  <p>Biaya: {{ $userItem->biaya }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <!-- card obat -->
        <div class="card mt-4">
          <div class="card-header">
            History Resep Obat
          </div>
          <div class="card-body">
            @foreach ($dataResepObat as $resepObat)
              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">{{ $resepObat->kode_obat }}</h5>
                  @foreach ($obats as $obat)
                    @if ($obat->kode_obat == $resepObat->kode_obat)
                      <p>Nama Obat: {{ $obat->nama_obat }}</p>
                      <p>Biaya: {{ $obat->harga * $resepObat->qty }}</p>
                    @endif
                  @endforeach
                  <p class="card-text">Kuantitas: {{ $resepObat->qty }}</p>
                  <p class="card-text">Dosis: {{ $resepObat->dosis }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        @if ($resepObat->kode_obat)
          <input type="hidden" id="kode_pasien" name="kode_pasien" value="{{ $resepObat->kode_resep_obat }}">
        @else
          <input type="hidden" id="kode_pasien" name="kode_pasien" value="{{ $rujukan->kode_rujukan }}">
        @endif
        <button type="submit" class="btn btn-primary mt-3" id="submitBtn">Tambah Nota</button>
      </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tambahNotaPembayaran').on('submit', function(e) {
        e.preventDefault();

        let layananList = [];
        let kode_pasien = '';
        $('.item_layanan:checked').each(function() {
          let layananID = $(this).val();
          let harga = $(this).closest('tr').find('td:last-child').text();
          let kode_pasien = document.getElementById('kode_pasien').value;

          let layananData = {
            id: layananID,
            biaya: harga
          };

          layananList.push(layananData);
        });



        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        let payload = {
          layananList: layananList,
          kode_pasien: kode_pasien
        };

        $.ajax({
          url: $(this).attr('action'),
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          data: payload,
          success: function(response) {
            alert('Obat berhasil ditambahkan!');
            // Lakukan tindakan lain setelah obat berhasil ditambahkan
            window.location.href = "/dashboard/resepobat";
          },
          error: function(xhr, status, error) {
            // Respon error dari server
            if (xhr.responseJSON && xhr.responseJSON.errors) {
              // Terdapat pesan kesalahan yang dikirimkan oleh server
              var errorMessages = xhr.responseJSON.errors;
              alert('Terjadi kesalahan: ' + errorMessages.join('\n'));
            } else {
              // Pesan kesalahan umum
              alert('Terjadi kesalahan. Silakan coba lagi!');
            }
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>
@endsection
