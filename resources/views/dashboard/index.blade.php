@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Dashboard</h1>
        </div>
        <a class="btn btn-primary mb-3" href="{{ route('exportpelanggan') }}" role="button">Export Pelanggan</a>
        <div class="row">
            <div class="col-12 mb-4">
              <div class="hero bg-primary text-white">
                <div class="hero-inner">
                  <h2>Welcome Back, {{ auth()->user()->name  }}👋</h2>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pelanggan Pending</h4>
                  </div>
                  <div class="card-body">
                    {{ $pending }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pelanggan Sukses</h4>
                  </div>
                  <div class="card-body">
                    {{ $sukses }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pelanggan Gagal</h4>
                  </div>
                  <div class="card-body">
                    {{ $gagal }}
                  </div>
                </div>
              </div>
            </div>


        </div>
    </section>
</div>
@endsection