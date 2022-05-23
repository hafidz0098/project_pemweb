<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Layanan;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            "title" => "Tanjung Bira",
            'active' => 'home',
            'posts' => Post::latest()->paginate(3),
            'layanans' => Layanan::latest()->paginate(4),
            'galeris' => Galeri::latest()->paginate(10)
        ]);
    }
}
