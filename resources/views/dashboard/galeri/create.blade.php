@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-header">
      <h1>Tambah Galeri</h1>
      </div>

      <div class="row">
          <div class="col-lg-9">
            <form method="POST" action="/dashboard/galeri" class="mb-5" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="image" class="form-label">Galeri image</label>
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
              <button type="submit" class="btn btn-primary">Tambah Galeri</button>
          </form>
          </div>
      </div>
  </section>
</div>

  <script>

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