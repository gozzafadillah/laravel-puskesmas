@extends('layouts.main')

@section('container')

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="section-title mb-3">Nomor Antrian</h2>
                </div>
                <!-- topic-item -->
                <div class="col-lg-4 col-sm-6 mb-4">
                    <button class="px-4 py-5 bg-white shadow text-center d-block match-height border-0"
                        style="width: 300px; height: 230px;">
                        <p class="h3">Poli Umum</p>
                        <br>
                        <p class="fs-1">0</p>
                        <p class="mb-0">&nbsp;</p>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <button class="px-4 py-5 bg-white shadow text-center d-block match-height border-0"
                        style="width: 300px; height: 230px;">
                        <p class="h3">Poli Gigi</p>
                        <br>
                        <p class="fs-1">0</p>
                        <p class="mb-0">&nbsp;</p>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <button class="px-4 py-5 bg-white shadow text-center d-block match-height border-0"
                        style="width: 300px; height: 230px;">
                        <p class="h3">Poli Lansia</p>
                        <br>
                        <p class="fs-1">0</p>
                        <p class="mb-0">&nbsp;</p>
                </div>
            </div>
        </div>
    </section>

    <h1 class="mb-3 text-center">{{ $title }}</h1>

    @if ($posts->count())
        <div class="card mb-3 mt-3">

            @if ($posts[0]->image)
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                    class="img-fluid rounded mx-auto d-block" width="500px" height="400px">
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                    alt="{{ $posts[0]->category->name }}" class="img-fluid">
            @endif

            <div class="card-body">
                <h3 class="card-title"><a class="text-decoration-none text-dark"
                        href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small>
                        <h5>By : <a href="/posts?author={{ $posts[0]->author->username }}"
                                class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                                class="text-decoration-none"
                                href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        </h5>
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}...</p>
                <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
                <a class="text-decoration-none btn btn-primary" href="/posts/{{ $posts[0]->slug }}">Baca Selengkapnya</a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                                <a class="text-decoration-none text-light"
                                    href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </div>

                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                    class="img-fluid rounded mx-auto d-block" width="500px" height="400px">
                            @else
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                    alt="{{ $post->category->name }}" class="img-fluid">
                            @endif


                            <div class="card-body">
                                <h5 class="card-title"><a class="text-decoration-none text-dark"
                                        href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                <p>
                                    <small>
                                        By : <a href="/posts?author={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }}</a>
                                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}.</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Post Not Found.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
