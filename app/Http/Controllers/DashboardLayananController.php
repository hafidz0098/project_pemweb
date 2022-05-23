<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Alert;

class DashboardLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.daftar-wisata.index',[
            'layanans' => Layanan::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.daftar-wisata.create');
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
            'harga' => 'required|max:11',
            'image' => 'required|image|file|max:1024',
        ]);

        if($request->file('image')){
            $path = $request->file('image')->store('wisata_image', 's3');
        }

        $path = Storage::disk('s3')->url($path);
        $validatedData['image'] = $path;
        $validatedData['image_id'] = basename($path);

        Layanan::create($validatedData);
        Alert::success('Berhasil', 'Sukses menambahkan wisata baru!');
        return redirect('/dashboard/daftar-wisata');
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
    public function edit($id)
    {
        $layanan = Layanan::find($id);
        return view('dashboard.daftar-wisata.edit',[          
            'layanan' => $layanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'name' => 'required|max:255',
            'harga' => 'required|max:11',
            'image' => '|image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::disk('s3')->delete('wisata_image/'.$layanan->image_id); 
            }

            $path = $request->file('image')->store('wisata_image', 's3');
            $path = Storage::disk('s3')->url($path);
            $validatedData['image'] = $path;
            $validatedData['image_id'] = basename($path);
        }
        $layanan = Layanan::find($id);
        $layanan->update($validatedData);


        Alert::success('Berhasil', 'Sukses mengedit daftar wisata!');
        return redirect('/dashboard/daftar-wisata');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan, $id)
    {
        if($layanan->image){
            Storage::disk('s3')->delete('wisata_image/'.$layanan->image_id); 
        }

        $layanan = Layanan::find($id);

        $layanan->delete($layanan);
        Alert::success('Berhasil', 'Sukses menghapus daftar wisata!');
        return redirect('/dashboard/daftar-wisata');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]); 
    }
}
