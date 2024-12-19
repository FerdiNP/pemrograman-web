<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
  use HasFactory;

  protected $primaryKey = 'id_member';

  /**
  * fillable
  *
  * @var array
  */
  protected $fillable = [
    'nama_member',
    'alamat_member',
    'jenis_kelamin',
    'no_telpon',
  ];
}
