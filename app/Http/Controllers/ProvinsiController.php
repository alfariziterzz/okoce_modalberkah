<?php

namespace App\Http\Controllers;

use App\Models\ProvinsiModel;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function findAll(){
        $records = ProvinsiModel::get();
        $json = array(); 
		if(isset($records)){
			foreach ($records as $record) :
				$json['id'][] = $record->id;
				$json['text'][] = $record->prov;
			endforeach;
		}
		return json_encode($json);
    }
}
