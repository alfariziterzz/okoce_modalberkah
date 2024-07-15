<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanModel extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $primaryKey = 'id';
    public function scopePengajuan($query)
    {
        return $query->where('status_persetujuan',1); // baru
    }
    public function o_member(){
        return $this->hasOne(MemberModel::class,'ref','ref_member');
    }
}
