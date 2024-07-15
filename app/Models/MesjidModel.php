<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesjidModel extends Model
{
    use HasFactory;
    protected $table = 'mesjid';
    protected $primaryKey = 'id';
    public function o_provinsi()
    {
        return $this->hasOne(ProvinsiModel::class,'id','provinsi');
    }
    public function o_kabupaten()
    {
        return $this->hasOne(KabupatenModel::class,'id','kabupaten');
    }
}
