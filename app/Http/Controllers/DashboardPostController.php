<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Alert;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'required|image|file|max:1024',   
            'body' => 'required'
        ]);

        if($request->file('image')){
            $path = $request->file('image')->store('post_image', 's3');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $path = Storage::disk('s3')->url($path);

        $validatedData['image'] = $path;
        $validatedData['image_id'] = basename($path);

        Post::create($validatedData);
        Alert::success('Berhasil', 'Sukses menambahkan berita baru!');
        return redirect('/dashboard/posts');
    } 
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // if($post->author->id !== auth()->user()->id) {
        //     abort(403);
        // }
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // if($post->author->id !== auth()->user()->id) {
        //     abort(403);
        // }
        return view('dashboard.posts.edit',[             
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',   
            'body' => 'required'
        ];


        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts'; 
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::disk('s3')->delete('post_image/'.$post->image_id); 
            }

            $path = $request->file('image')->store('post_image', 's3');
            $path = Storage::disk('s3')->url($path);
            $validatedData['image'] = $path;
            $validatedData['image_id'] = basename($path);
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        

        // if($post->author->id !== auth()->user()->id) {
        //     abort(403);
        // }

        Post::where('id', $post->id)
            ->update($validatedData);

        Alert::success('Berhasil', 'Sukses mengedit berita!');
        return redirect('/dashboard/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // if($post->author->id !== auth()->user()->id) {
        //     abort(403);
        // }

        if($post->image){
            Storage::disk('s3')->delete('post_image/'.$post->image_id); 
        }

        Post::destroy($post->id);
        Alert::success('Berhasil', 'Sukses menghapus berita!');
        return redirect('/dashboard/posts');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]); 
    }
}
