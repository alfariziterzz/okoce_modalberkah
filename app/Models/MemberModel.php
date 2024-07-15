<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $primaryKey = 'id';
    public function o_pinjaman(){
        return $this->hasMany(PinjamanModel::class,'ref','ref_member');
    }
}
