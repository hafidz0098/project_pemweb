<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use App\Mail\InformasiKodeEmail;
use Alert;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pelanggan.pelanggan-pending',[
            'pelanggans' => Pelanggan::where('status_id', '1')->orderBy('created_at', 'desc')->get(),
            'statuses' => Status::all()
        ]);
    }

    public function showSukses(){
        return view('dashboard.pelanggan.pelanggan-sukses',[
            'pelanggans' => Pelanggan::where('status_id', '2')->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function showGagal(){
        return view('dashboard.pelanggan.pelanggan-gagal',[
            'pelanggans' => Pelanggan::where('status_id', '3')->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function pelangganexport(){
        return Excel::download(new PelangganExport, 'pelanggan.xlsx');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'status_id' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $pelanggan = Pelanggan::find($id);
        $voucher = Str::random(20);
        $pelanggan->kode_voucher = $voucher;
        $pelanggan->update($validatedData);
        
        Mail::to($pelanggan->email)->send(new InformasiKodeEmail($pelanggan, "Voucher Pemesanan Paket Wisata"));
        Alert::success('Berhasil', 'Sukses mengupdate data pelanggan!');
        return redirect('/dashboard/pelanggan-pending');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
