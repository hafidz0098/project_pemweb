@extends('layouts.frontend.header')
@section('content')

<section class="more-services section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Blog</h2>
      </div>

      <div class="row">
        @if ($posts->count())
        @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="card mb-5">
            <img src="{{ $post->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="/berita/{{ $post->slug }}">{{ $post->title }}</a></h5>
              <p class="card-text" style="justify-content: center">{{ $post->excerpt }}</p>
              <a href="/blog/{{ $post->slug }}" class="button">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <p class="blog-container text-center fs-3 p-cust" style="padding-bottom: 200px">No Post Found!</p>
        @endif
      </div>

    </div>
  </section><!-- End More Services Section -->

@endsection