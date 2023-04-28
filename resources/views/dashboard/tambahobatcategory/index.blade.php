@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
</div>
    
    <div class="table-responsive col-lg-6">
      <a href='/dashboard/tambahacategoryobat/create' class="btn btn-primary mb-3"><span data-feather="plus" class="align-text-bottom"></span> Tambah Category</a>

        @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                {{  session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nomer</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Url Kategori</th>
              <th scope="col">image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>1</td>
                <td>{{ $category->name }}</td>
                <td>{{$category->slug}}</td>
                <td><img style="width: 12rem"  src="{{ asset('storage/' . $category->image) }}" alt="..."></td>
                <td>
                  <div class="d-flex">
                    <a class="badge bg-primary border-0" href="/dashboard/tambahacategoryobat/edit/{{$category->id}}"><span data-feather="edit"></span></a> 
                  <form method="post" action="/dashboard/tambahacategoryobat/delete/{{$category->id}}" >
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge bg-danger border-0"><span data-feather="trash"></span></button>
                  </form>
                  </div>
                  </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>      
      

@endsection