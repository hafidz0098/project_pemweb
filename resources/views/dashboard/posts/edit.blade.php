@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-header">
      <h1>Edit Blog</h1>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  autofocus value="{{ old('title', $post->title) }}">
                  @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">  
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  value="{{ old('slug', $post->slug) }}">
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="image" class="form-label">Post image</label>
                  <input type="hidden" name="oldImage" value="{{ $post->image }}">
                  @if ($post->image)
                  <img src="{{ $post->image }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                  @else
                  <img class="img-preview img-fluid mb-3 col-sm-5">
                  @endif
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                    <label class="custom-file-label" for="customFileLang">Upload</label>
                    @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
              </div>
              <div class="mb-3">
                  <label for="body" class="form-label">Body</label>
                  @error('body')
                    <p class="text-danger small">{{ $message }}</p>
                  @enderror
                  <input id="body" type="hidden" name="body"  value="{{ old('body', $post->body) }}">
                  <trix-editor input="body"></trix-editor>
              </div>
              <button type="submit" class="btn btn-primary">Update post</button>
          </form>
      </div>
      </div>
  </section>
</div>
    

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })

        function previewImage(){
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');
            
          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
          }
        }
    </script>
    
@endsection