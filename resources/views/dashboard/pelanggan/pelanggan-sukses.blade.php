@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Pelanggan Sukses</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                <thead class="p-3 mb-2 bg-success text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor WA</th>
                                        <th>Paket Wisata</th>
                                        <th>Jumlah</th>
                                        <th>Total Bayar</th>
                                        <th>Kode Voucher</th>
                                        <th>Waktu Pemesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($pelanggans as $pelanggan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelanggan->name }}</td>
                                        <td>{{ $pelanggan->email }}</td>
                                        <td>{{ $pelanggan->nomor_wa }}</td>
                                        <td>{{ $pelanggan->layanan_id }}</td>
                                        <td>{{ $pelanggan->jumlah }}</td>
                                        <td>@currency($pelanggan->total_bayar)</td>
                                        <td>{{ $pelanggan->kode_voucher }}</td>
                                        <td>{{ $pelanggan->created_at }}</td>
                                    </tr>  
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection