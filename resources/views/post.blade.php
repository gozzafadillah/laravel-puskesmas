@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <h5>By : <a href="/posts?author={{ $post->author->username }}"
            class="text-decoration-none">{{ $post->author->name }} </a>in <a style="text-decoration:none"
            href="/posts?category={{ $post->category->slug }}"> {{ $post->category->name }} </a></h5>
        @if ($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
            class="img-fluid d-block mx-auto rounded" width="500px" height="400px">
        @else
          <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" alt="{{ $post->category->name }}"
            class="img-fluid">
        @endif
        <article class="fs-6 my-3">
          {!! $post->body !!}
        </article>

        <a href="/posts" class="d-block mt-4 mb-5">Back Page</a>
      </div>
    </div>
  </div>
@endsection
