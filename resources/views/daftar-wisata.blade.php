@extends('layouts.frontend.header')
@section('content')
<section id="paket-wisata" class="paket-wisata">
    <div class="container">
      <div class="section-title">
        <h2>Paket Wisata</h2>
      </div>
      <div class="row">
        @if ($layanans->count())
        @foreach ($layanans as $layanan)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch justify-content-center mb-5 mb-lg-0">
          <div class="card" style="width: 18rem;">
            <img src="{{ $layanan->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $layanan->name }}</h5>
              <p class="card-text">@currency($layanan->harga)</p>
              <a href="/pesan" class="btn btn-warning">Pesan Sekarang</a>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <p class="blog-container text-center fs-3 p-cust" style="padding-bottom: 200px">No Post Found!</p>
        @endif
        
      </div>
    </div>
  </section>
@endsection