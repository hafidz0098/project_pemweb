@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Lihat Blog</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>  
                    </form>

                    <div style="max-height: 400px; overflow:hidden;">
                        <img src="{{ $post->image }}" class="img-fluid mt-3">
                    </div>
                    
                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
            </div>
        </div>
    </section>
</div>
@endsection