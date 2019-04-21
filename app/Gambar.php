<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    //
    protected $table = "gambar";
    //keterangan yg hanya boleh di isi oleh table gambar
    protected $fillable = ['file','keterangan'];
}
