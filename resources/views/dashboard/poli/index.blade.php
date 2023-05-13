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
                    <th scope="col">Jadwal</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $poli)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $poli->name }}</td>
                        <td>{{ $poli->dokter }}</td>
                        <td>{{ $poli->jadwal }}</td>
                        <td>{{ $poli->isActive }}</td>
                        <td>action</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
