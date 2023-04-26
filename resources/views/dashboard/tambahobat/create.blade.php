@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Obat Puskesmas</h1>
</div>

@if (session()->has('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{  session('status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><span data-feather="plus" class="align-text-bottom"></span> Tambah Obat</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/dashboard/tambahobat" method="post" class="mb-3">
          @csrf
        <div class="mb-3">
        <label for="kode_obat" class="form-label">Kode Obat</label>
        <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat" name="kode_obat" placeholder="Masukan Kode Obat  (Tidak Bisa diganti)" value="{{ old('kode_obat') }}" autofocus>
        @error('kode_obat')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="nama_obat" class="form-label">Nama Obat</label>
        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" placeholder="Masukan Nama Obat" value="{{ old('nama_obat') }}" autofocus>
        @error('nama_obat')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="nama_obat" class="form-label">Kategori Obat</label>
        <select class="form-select" aria-label="Default select example" name="kategori_obat">
        <option disabled selected>Pilih Kategori Obat</option>
        <option>One</option>
        <option>Two</option>
        <option>Three</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="stok" class="form-label">Stok Obat</label>
        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Masukan Stok Obat" value="{{ old('stok') }}" autofocus>
        @error('stok')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga Obat</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukan Harga Obat" value="{{ old('harga') }}" autofocus>
        @error('harga')
              <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
      </div>
     
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Obat</button>
    </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <form action="/dashboard/tambahobat" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari obat...">
            <button type="submit" class="btn btn-primary">  <span data-feather="search" class="align-text-bottom"></span></button>
        </div>
    </form>
  </div>
</div>


<div class="table-responsive">
<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nomer</th>
              <th scope="col">Kode Obat</th>
              <th scope="col">Nama Obat</th>
              <th scope="col">Kategori</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga Obat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($obats as $obat)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $obat->kode_obat }}</td>
              <td>{{ $obat->nama_obat }}</td>
              <td>{{ $obat->kategori_obat }}</td>
              <td>{{ $obat->stok }}</td>
              <td>Rp. {{ $obat->harga }}</td>
              <td>


                
                <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#update{{ $obat->kode_obat }}"><span data-feather="edit"></span></a>

                
                <div class="modal fade" id="update{{ $obat->kode_obat }}" tabindex="-1" aria-labelledby="updateLabel{{ $obat->kode_obat }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="updateLabel{{ $obat->kode_obat }}">Edit Informasi Obat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="/dashboard/tambahobat/{{ $obat->kode_obat }}" method="post" class="mb-3">
                          @method('put')
                          @csrf

                        <div class="mb-3">
                        <label for="kode_obat" class="form-label">Kode Obat</label>
                        <input type="text" disabled class="form-control @error('kode_obat') is-invalid @enderror" id="kode_obat" name="kode_obat" placeholder="Masukan Kode Obat" value="{{ old('kode_obat', $obat->kode_obat) }}" autofocus>
                        @error('kode_obat')
                              <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                
                      <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" placeholder="Masukan Nama Obat" value="{{ old('nama_obat', $obat->nama_obat) }}" autofocus>
                        @error('nama_obat')
                              <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                      </div>
                
                      <div class="mb-3">
                        <label for="nama_obat" class="form-label">Kategori Obat</label>
                        <select class="form-select" aria-label="Default select example" name="kategori_obat">
                        {{-- <option disabled selected>Silahkan Pilih Kategori</option> --}}
                        <option value="{{ old('kategori_obat', $obat->kategori_obat) }}" selected>{{ old('kategori_obat', $obat->kategori_obat) }}</option> 
                        <hr>                   
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                        </select>
                      </div>
                
                      <div class="mb-3">
                        <label for="stok" class="form-label">Stok Obat</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Masukan Stok Obat" value="{{ old('stok', $obat->stok) }}" autofocus>
                        @error('stok')
                              <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                      </div>
                
                      <div class="mb-3">
                        <label for="harga" class="form-label">Harga Obat</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukan Harga Obat" value="{{ old('harga', $obat->harga) }}" autofocus>
                        @error('harga')
                              <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                      </div> 
                     <input type="text" name="kode_obat" value="{{ $obat->kode_obat }}" hidden>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary"><span data-feather="plus-circle"></span> Update Obat</button>
                    </form>
                      </div>
                    </div>
                  </div>
                </div>


                <form action="/dashboard/tambahobat/{{ $obat->kode_obat }}" method="post" class="d-inline">
                @csrf
                  @method('delete')
                  <input type="text" name="kode_obat" value="{{ $obat->kode_obat }}" hidden>
                  <button class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu akan Hapus Obat Ini?')"><span data-feather="trash"></span></button>                  
                </form>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

@endsection

