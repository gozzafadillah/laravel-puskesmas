@extends('layouts.main')

@section('container')
    <h1> Halaman About </h1>
    <h2>{{ $name }}</h2>
    <h2>{{ $About }}</h2>
    <img src="img/{{ $image }}" alt="Roro Jonggarang" width="200" class="img-thumbnail rounded-circle">
    <script src="css/style.css"></script>
@endsection
    