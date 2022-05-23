<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['layanan'];

    public function layanan(){
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
