<?php

namespace App\Http\Controllers;

use App\Models\KecamatanModel;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function findByKab($id){
        $records = KecamatanModel::where("id_kabupaten",$id)->get();
        $json = array(); 
		if(isset($records)){
			foreach ($records as $record) :
				$json['id'][] = $record->id;
				$json['text'][] = $record->kec;
			endforeach;
		}
		return json_encode($json);
    }
}
