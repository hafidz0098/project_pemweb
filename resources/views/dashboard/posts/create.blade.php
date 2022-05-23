@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-header">
      <h1>Tambah blog</h1>
      </div>

      <div class="row">
          <div class="col-lg-9">
            <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                  @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="image" class="form-label">Post image</label>
                  <img class="img-preview img-fluid mb-3 col-sm-5">
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
                  <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
                  <trix-editor input="body"></trix-editor>
              </div>
              <button type="submit" class="btn btn-primary">Create post</button>
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