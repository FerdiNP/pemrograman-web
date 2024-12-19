<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
  use HasFactory;

  protected $primaryKey = 'id_paket';

  /**
  * fillable
  *
  * @var array
  */
  protected $fillable = [
    'nama_paket',
    'jenis_paket',
    'deskripsi_paket',
    'harga_paket',
  ];
}
