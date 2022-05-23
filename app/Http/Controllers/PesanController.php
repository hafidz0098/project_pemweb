<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InformasiPemesananEmail;
use Alert;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pesan',[
            'layanans' => Layanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:pelanggans',
            'nomor_wa' => 'required|max:20|unique:pelanggans',
            'jumlah' => 'required|max:255',
            'layanan_id' => 'required'
        ], [
            'name.required' => 'Mohon masukkan nama anda',
            'email.required' => 'Mohon masukkan alamat email anda',
            'email.unique' => 'Email sudah terdaftar',
            'nomor_wa.required' => 'Mohon masukkan nomor whatsapp anda',
            'nomor_wa.unique' => 'Nomor whatsapp sudah terdaftar',
            'jumlah.required' => 'Mohon masukkan jumlah pesanan',
            'layanan_id.required' => 'Mohon pilih daftar wisata',
        ]);

        $layanan = Layanan::find($request->input('layanan_id'));
        $pelanggan = Pelanggan::create($validatedData);
        $random_angka = rand(1,999);
        $harga = $layanan->harga;
        $jumlah = $request->input('jumlah');
        $pelanggan->total_bayar = $jumlah*$harga+$random_angka;
        $pelanggan->save();

        Mail::to($validatedData['email'])->send(new InformasiPemesananEmail($pelanggan, "Informasi Pemesanan Paket Wisata Tanjung Bira"));
        Alert::success('Berhasil', 'Sukses membuat pesanan, silahkan cek email anda!');
        return redirect('/pesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        //
    }
}
