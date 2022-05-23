<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        return view('daftar-wisata',[
            'layanans' => Layanan::orderBy('created_at', 'desc')->get()
        ]);
    }
}
