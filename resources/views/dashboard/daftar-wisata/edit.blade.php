@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-header">
      <h1>Edit Daftar Wisata</h1>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <form method="post" action="/dashboard/daftar-wisata/{{ $layanan->id }}" class="mb-5" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  autofocus value="{{ old('name', $layanan->name) }}">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required value="{{ old('harga') ? old('harga') : $layanan->harga }}">
                @error('harga')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
              <div class="mb-3">
                  <label for="image" class="form-label">Wisata image</label>
                  <input type="hidden" name="oldImage" value="{{ $layanan->image }}">
                  @if ($layanan->image)
                  <img src="{{ $layanan->image }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
              <button type="submit" class="btn btn-primary">Update daftar wisata</button>
          </form>
      </div>
      </div>
  </section>
</div>
    

    <script>
      

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