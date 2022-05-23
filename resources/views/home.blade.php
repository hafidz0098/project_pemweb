@extends('layouts.frontend.header')
@extends('layouts.frontend.hero')
@section('content')
<main id="main">

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
              <div class="justify-content-center">
                <a href="/pesan" class="btn btn-warning btn-block" style="align-items: center">Pesan Sekarang</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <p class="blog-container text-center fs-3 p-cust" style="padding-bottom: 200px">No Daftar Wisata Found!</p>
        @endif
        <div class="text-center mt-3">
          <a href="/daftar-wisata" class="btn btn-secondary text-white">Cek Wisata Selengkapnya</a>
        </div>
        
      </div>
    </div>
  </section>

  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Cara Pemesanan</h2>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4 class="title"><a href="">1. Lihat daftar wisata</a></h4>
            <p class="description">Silahkan melihat pilihan paket wisata yang ingin anda pesan terlebih dahulu</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4 class="title"><a href="">2. Klik pesan sekarang pada paket wisata yang anda pilih</a></h4>
            <p class="description">anda akan diarahkan ke halaman form pengisian data untuk pesanan</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="">3.Isi formulir pemesanan dan pilih paket wisata yang anda inginkan</a></h4>
            <p class="description">Silahkan isi data diri anda dan pilih paket wisata</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">4. Klik tombol pesan</a></h4>
            <p class="description">Ketika pemesanan berhasil maka akan muncul popup pemesanan berhasil dan silahkan cek email anda</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">5. Cek email anda</a></h4>
            <p class="description">Setelah anda memesan email informasi pemesanan akan secara otomatis terkirim ke email anda
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">6. Lakukan pembayaran</a></h4>
            <p class="description">Silahkan lakukan pembayaran ke rekening yang tertera sesuai dengan nominal yang dikirimkan melalui email anda 
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">7. Cek email anda yang berisi kode voucher pemesanan</a></h4>
            <p class="description">Setelah anda melakukan pembayaran maka admin akan memverifikasi pembayaran anda dan mengirimkan anda email kode voucher
            </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box mb-3">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">8. Selesai</a></h4>
            <p class="description">Anda berhasil melakukan pemesanan paket wisata
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Our Services Section -->

  <section class="more-services section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Blog</h2>
      </div>

      <div class="row">
        @if ($posts->count())
        @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="card">
            <img src="{{ $post->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h5>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a href="/blog/{{ $post->slug }}" class="button">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <p class="blog-container text-center fs-3 p-cust" style="padding-bottom: 200px">No Post Found!</p>
        @endif
      </div>

      <div class="text-center mt-5">
        <a href="/blog" class="btn btn-secondary text-white">Cek Berita Selengkapnya</a>
      </div>

    </div>
  </section><!-- End More Services Section -->

  <section class="info-box py-0">
    <div class="container-fluid">

      <div class="section-title">
        <h2 class="mt-5">Pertanyaan yang sering ditanyakan</h2>
      </div>

      <div class="row">

        <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Dimana lokasi pantai tanjung bira? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    Lokasi pantai tanjung bira berada di Jl. Tanjung Bira, Bonto Bahari. Bulukumba, Sulawesi selatan. Tanjung Bira terletak sekitar 40 km dari Kota Bulukumba atau 200 km dari Kota Makassar dengan waktu tempuh sekitar 3-4 jam lamanya.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Berapa harga tiket masuk tanjung bira? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Harga tiket pantai tanjung bira adalah 10 ribu rupiah untuk wisatawan nusantara. Dan untuk wisatawan asing akan dikenakan biaya sebesar 20 ribu rupiah..
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Apa saja paket wisata di Tanjung Bira? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Paket wisata di tanjung bira meliputi Diving, Snorkeling, Banana Boat dan masih banyak lainnya
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End Info Box Section -->

  <!-- ======= Our Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Cek Galeri Kami</h2>
      </div>

      <div class="row portfolio-container">
        @if ($galeris->count())
        @foreach ($galeris as $galeri)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="{{ $galeri->image }}" class="img-fluid" alt="">
            <div class="portfolio-links">
              <a href="{{ $galeri->image }}" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bx bx-search"></i></a>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <p class="blog-container text-center fs-3 p-cust" style="padding-bottom: 200px">No Galeri Found!</p>
        @endif



      </div>

    </div>
  </section><!-- End Our Portfolio Section -->

</main><!-- End #main -->
@endsection