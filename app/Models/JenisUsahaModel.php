<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsahaModel extends Model
{
    use HasFactory;
    protected $table = 'jenis_usaha';
    protected $primaryKey = 'id';
}
