<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Alert;

class DashboardGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.galeri.index',[
            'galeris' => Galeri::orderBy('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galeri.create');
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
            'image' => 'required|image|file|max:1024'
        ]);

        if($request->file('image')){
            $path = $request->file('image')->store('galeri_image', 's3');
        }

        $path = Storage::disk('s3')->url($path);

        $validatedData['image'] = $path;
        $validatedData['image_id'] = basename($path);

        Galeri::create($validatedData);
        Alert::success('Berhasil', 'Sukses menambahkan galeri baru!');
        return redirect('/dashboard/galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {

        if($galeri->image){
            Storage::disk('s3')->delete('galeri_image/'.$galeri->image_id); 
        }
        Galeri::destroy($galeri->id);
        if($galeri){
            Alert::success('Berhasil', 'Sukses menghapus galeri!');
            return redirect('/dashboard/galeri');
        }else{
            Alert::error('Gagal', 'gagal menghapus galeri!');
            return back();
        }
        
    }
}
