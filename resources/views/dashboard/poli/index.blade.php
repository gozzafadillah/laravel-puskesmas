@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Poli Puskesmas</h1>
    </div>

    <div class="table-responsive">
        <a href="/dashboard/poli/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Buat Baru</a>

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
                    <th scope="col">Nama</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">Ruangan</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $poli)
                    <tr>
                        <td>{{ $poli->kode }}</td>
                        <td>{{ $poli->name }}</td>
                        <td>{{ $poli->Dokter->name }}</td>
                        <td>{{ $poli->ruangan }}</td>
                        <td>{{ $poli->jadwal . ' WIB' }}</td>
                        <td>{!! $poli->isActive
                            ? "<span class='badge bg-success border-0'>active</span>"
                            : "<span class='badge bg-danger border-0'>non active</span>" !!}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="/dashboard/poli/{{ $poli->kode }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="badge bg-danger border-0"
                                        onclick="return confirm('Apakah Kamu akan Hapus Postingan Ini?')"><span
                                            data-feather="trash"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
