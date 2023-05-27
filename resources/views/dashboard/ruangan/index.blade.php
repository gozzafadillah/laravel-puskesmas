@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Ruangan Puskesmas</h1>
    </div>

    <div class="table-responsive">
        <a href="/dashboard/ruangan/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Buat Baru</a>

        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Nomer</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $ruangan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ruangan->kode }}</td>
                        <td>{{ $ruangan->name }}</td>
                        <td>{!! $ruangan->status
                            ? '<span class="badge bg-success">terisi</span>'
                            : '<span class="badge bg-danger">kosong</span>' !!}</td>
                        <td>
                            <div class="m-1 d-flex gap-1">
                                <form action="/dashboard/ruangan/{{ $ruangan->kode }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah Kamu akan Hapus Postingan Ini?')"
                                        class="badge bg-danger border-0"><span data-feather="trash"></span></button>
                                </form>
                                <a class="badge bg-success border-0"
                                    href="/dashboard/ruangan/{{ $ruangan->kode }}/edit"><span
                                        data-feather="edit"></span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
