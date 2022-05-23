@extends('layouts.frontend.header')

@section('content')

    <section id="isi-berita" class="isi-berita">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 col-md-8">
                    <img src="{{ $post->image }}" class="img-fluid w-100 post-img">
                    <div class="card bg">
    
                        <article class="my-3">
                            <h1 class="mt-3" style="margin-bottom: 20px">{{ $post->title }}</h1>
                            {!! $post->body !!}
                            <a href="/blog" class="btn btn-secondary mt-4">Kembali</a>
                        </article>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
@endsection