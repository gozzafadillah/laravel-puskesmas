@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h2 class="section-title mb-3">Nomor Antrian</h2>
        </div>
        <!-- Poli-item -->
        @foreach ($polis as $poli)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="px-4 py-5 bg-white shadow text-center d-block match-height border-0"
                    style="width: 300px; height: 230px;">
                    <p class="h3">{{ $poli->name }}</p>
                    <br>
                    @foreach ($antrian as $antrianItem)
                        @if ($poli->kode == $antrianItem->kode_poli)
                            <p class="fs-1">{{ $antrianItem->kode_antrian }}</p>
                            <p class="mb-0">&nbsp;</p>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

        <div id="daftar-antrian" class="col-lg-12 col-sm-12 mb-5" style="cursor: pointer">
            <div class="px-4 py-5 text-light shadow text-center d-block bg-primary match-height border-0"
                style="height: 150px;">
                <p class="h3">Daftar Antrian</p>
            </div>
        </div>

        {{-- Data daftar antrian --}}
        <div id="form-data" class="row justify-content-center" style="display: none">
            @auth
                <div class="col-12 text-center">
                    <h2 class="section-title my-2">Daftar Antrian</h2>
                </div>
                <div class="col-lg-6 col-sm-6">
                    @include('antrian/formAntrian')
                    <button id="tombol-close" class="btn btn-success mb-5">Close</button>

                </div>
            @else
                <div class="col-12 text-center">
                    <a href="/login" class="btn btn-danger">
                        <h2 class="section-title m-3">Login/Register Terlebih Dahulu!</h2>
                    </a>
                </div>
            @endauth
        </div>

    </div>

    <script>
        $(document).ready(function() {
            // Event onClick pada tombol "Tambah Data"
            $('#daftar-antrian').on('click', function() {
                // Tampilkan form
                $('#form-data').show();
                $('#daftar-antrian').hide();
            });

            // Event onClick pada tombol "Close"
            $('#tombol-close').on('click', function() {
                // Sembunyikan form
                $('#form-data').hide();
                $('#daftar-antrian').show();
            });
        });
    </script>
@endsection
