<?php

namespace App\Http\Controllers;

use App\Models\KabupatenModel;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function findByProv($id){
        $records = KabupatenModel::where("id_provinsi",$id)->get();
        $json = array(); 
		if(isset($records)){
			foreach ($records as $record) :
				$json['id'][] = $record->id;
				$json['text'][] = $record->kab;
			endforeach;
		}
		return json_encode($json);
    }
}
