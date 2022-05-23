@extends('layouts.frontend.header')

@section('content')

<section id="daftar" class="daftar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 align-center">
              <div class="section-title">
                <h2>Form Pemesanan</h2>
              </div>
              @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                </div>
              @endif
              @if(session()->has('daftarError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('daftarError') }}
                </div>
              @endif
                <form method="POST" action="/pesan" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Silahkan masukkan nama anda">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Silahkan masukkan email anda">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nomor_wa" class="form-label">Nomor Whatsapp</label>
                        <input type="number" class="form-control @error('nomor_wa') is-invalid @enderror" id="nomor_wa" name="nomor_wa" value="{{ old('nomor_wa') }}" placeholder="Silahkan masukkan nomor whatsapp anda">
                        @error('nomor_wa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="layanan" class="form-label">Paket Wisata</label>
                        <select class="form-select" name="layanan_id">
                            <option selected>Pilih paket wisata</option>
                            @foreach ($layanans as $layanan)
                                @if (old('layanan_id') == $layanan->id)
                                    <option value="{{ $layanan->id }}" selected>{{ $layanan->name }}</option>
                                @else
                                    <option value="{{ $layanan->id }}">{{ $layanan->name }} - @currency($layanan->harga)</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" placeholder="Silahkan masukkan jumlah pesanan">
                        @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin daftar? Pastikan semua data yang diinput sudah sesuai')">Pesan</button>
                </form>
            </div>
        </div>
    </div>
  </section>
    
@endsection