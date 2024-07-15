<?php

namespace App\Http\Controllers;

use App\Models\KeluarahanModel;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function findByKec($id){
        $records = KeluarahanModel::where("id_kecamatan",$id)->get();
        $json = array(); 
		if(isset($records)){
			foreach ($records as $record) :
				$json['id'][] = $record->id;
				$json['text'][] = $record->des;
			endforeach;
		}
		return json_encode($json);
    }
}
