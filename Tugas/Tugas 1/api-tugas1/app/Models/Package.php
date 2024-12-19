<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
      'nama_paket',
      'jenis_paket',
      'deskripsi_paket',
      'harga_paket',
    ]
}
