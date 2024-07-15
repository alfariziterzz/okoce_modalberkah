<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\PinjamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Datatables;
class PinjamanController extends Controller
{
    public function index(Request $request)
    {
      return view('pinjaman/pinjamanall', []);
    }
    public function getDatatable($ref,Request $request){
        $query  = PinjamanModel::with(['o_member'])->where("ref_mesjid",$ref)->orderBy('id', 'ASC');
        $query->orderBy('id', 'ASC');
        $dt = Datatables::of($query);
        $dt->addColumn('id', function ($row) {
          return $row->id;
        });
        $dt->addColumn('ref', function ($row) {
          return $row->ref;
        });
        $dt->addColumn('nama_usaha', function ($row) {
            return $row->o_member ? $row->o_member->nama_usaha : "";
        });
          
        $dt->addColumn('nama_pemilik', function ($row) {
          return $row->o_member ? $row->o_member->nama_pemilik : "";
        });
        $dt->addColumn('jumlah_pengajuan', function ($row) {
          return $row->jumlah_pengajuan ? $row->jumlah_pengajuan : "";
        });
        $dt->addColumn('jumlah_disetujui', function ($row) {
          return $row->jumlah_disetujui ? $row->jumlah_disetujui : "";
        });
        $dt->addColumn('color_status_pengajuan', function ($row) {
          return Helpers::getColorStatus($row->status_persetujuan);
        });
        $dt->addColumn('status_pengajuan', function ($row) {
            return Helpers::getStatus($row->status_persetujuan);
        });
        $dt->addColumn('status_lunas', function ($row) {
          return Helpers::getStatusLunas($row->status_lunas);
        });
        $dt->addColumn('color_status_lunas', function ($row) {
          return Helpers::getColorStatusLunas($row->status_lunas);
        });
        $dt->addColumn('delete_url', function ($row) {
          return route("mst.pinjaman.delete", $row->ref);
        });
        $dt->addColumn('created_at', function ($row) {
          return $row->created_at;
        });
        $dt->addColumn('updated_at', function ($row) {
          return $row->updated_at;
        });
        return $dt->make(true);
    }
    public function getDatatableBlmProses($ref,Request $request){
      $query  = PinjamanModel::with(['o_member'])->where("ref_mesjid",$ref)->where("status_persetujuan",1)->orderBy('id', 'ASC');
      $query->orderBy('id', 'ASC');
      $dt = Datatables::of($query);
      $dt->addColumn('id', function ($row) {
        return $row->id;
      });
      $dt->addColumn('ref', function ($row) {
        return $row->ref;
      });
      $dt->addColumn('nama_usaha', function ($row) {
          return $row->o_member ? $row->o_member->nama_usaha : "";
      });
        
      $dt->addColumn('nama_pemilik', function ($row) {
        return $row->o_member ? $row->o_member->nama_pemilik : "";
      });
      $dt->addColumn('jumlah_pengajuan', function ($row) {
        return $row->jumlah_pengajuan ? $row->jumlah_pengajuan : "";
      });
      $dt->addColumn('jumlah_disetujui', function ($row) {
        return $row->jumlah_disetujui ? $row->jumlah_disetujui : "";
      });
      $dt->addColumn('color_status_pengajuan', function ($row) {
        return Helpers::getColorStatus($row->status_persetujuan);
      });
      $dt->addColumn('status_pengajuan', function ($row) {
          return Helpers::getStatus($row->status_persetujuan);
      });
      $dt->addColumn('status_lunas', function ($row) {
        return Helpers::getStatusLunas($row->status_lunas);
      });
      $dt->addColumn('color_status_lunas', function ($row) {
        return Helpers::getColorStatusLunas($row->status_lunas);
      });
      $dt->addColumn('delete_url', function ($row) {
        return route("mst.pinjaman.delete", $row->ref);
      });
      $dt->addColumn('created_at', function ($row) {
        return $row->created_at;
      });
      $dt->addColumn('updated_at', function ($row) {
        return $row->updated_at;
      });
      return $dt->make(true);
  }
    public function store($ref_mesjid,Request $request)
    {
        // Helpers::authPermission('Masters.Mesjid.Create');
        $rules = array(
            'jumlah_pengajuan' => 'required',
        );
        $message = "Berhasil Tambah Data";
        if($request->ref == "")
          $record = new PinjamanModel();
        else{
          $message = "Berhasil update Data";
          $record = PinjamanModel::where("ref",$request->ref)->get()->first();
        }
        $record->ref = Uuid::uuid4()->toString();
        $validator = Validator::make($request->all(), [
          'jumlah_pengajuan' => ['required', 'string', 'max:255'],
        ]);
      
        if ($validator->fails()) {
          return response()->json([
              'code' => 422,
              'message' => 'Invalid params passed', // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        }
        $record->ref_mesjid = $ref_mesjid;
        $record->ref_member = $request->ref_member;
        $record->jumlah_pengajuan = $request->jumlah_pengajuan;
        $record->jumlah_disetujui = $request->jumlah_disetujui;
        $record->status_persetujuan = $request->status_persetujuan != "" ? $request->status_persetujuan : 1;
        $record->status_lunas = $request->status_lunas != "" ? $request->status_lunas : 2;
        $record->keterangan = $request->description;
        if(!$record->save()){
          $data['message'] = "Gagal";
          $data['success'] = false;
          return response()->json($data, 500);
        }
        // end save log
        $data['message'] = $message;
        $data['url'] = "";
        $data['data'] = $record;
        $data['success'] = true;
        return response()->json($data, 200);
    }
    public function findJumlah($ref,Request $request)
    {
        $jmlMesjid = PinjamanModel::where("ref_mesjid",$ref)->get()->count();
        $json = array('jumlah'=>$jmlMesjid);
        return json_encode($json);
    }
    public function findJumlahAll(Request $request)
    {
        $jmlMesjid = PinjamanModel::get()->count();
        $json = array('jumlah'=>$jmlMesjid);
        return json_encode($json);
    }
    public function CountPeminjam($ref,Request $request)
    {
        $data = DB::table('pinjaman')->where("ref_mesjid",$ref)->distinct('ref_member')->count('name');
        $json = array('jumlah'=>$data);
        return json_encode($json);
    }
    public function CountPeminjamAll(Request $request)
    {
        $data = DB::table('pinjaman')->distinct('ref_member')->count('name');
        $json = array('jumlah'=>$data);
        return json_encode($json);
    }
    public function SumPinjamanBlmLunas($ref,Request $request)
    {
        $data = DB::table('pinjaman')->where("ref_mesjid",$ref)->sum('jumlah_disetujui');;
        $json = array('jumlah'=>$data);
        return json_encode($json);
    }
    public function SumPinjamanBlmLunasAll(Request $request)
    {
        $data = DB::table('pinjaman')->sum('jumlah_disetujui');;
        $json = array('jumlah'=>$data);
        return json_encode($json);
    }
    public function view($ref,Request $request)
    {
        $datapinjaman = PinjamanModel::where("ref",$ref)->get()->first();
        $data['success'] = true;
        $data['data'] = $datapinjaman;
        
        return response()->json($data, 200);
    }
    public function destroy($ref)
    {
        // Helpers::authPermission('Pinjaman.Delete');
        $record = PinjamanModel::where("ref",$ref)->get()->first();
        $return = $record->delete();
        $message = "";
        if($return){
            $message = "Deleted successfully";
        }else{
            $data['message'] = 'Ada kesalahan';
            $data['success'] = false;
            return response()->json($data, 200);
        }
        $data['message'] = $message;
        $data['success'] = true;
        return response()->json($data, 200);
    }
    public function getDatatableAll(Request $request){
      $query  = PinjamanModel::with(['o_member'])->orderBy('id', 'ASC');
      $inputs = request()->get('search');
      if (is_array($inputs)) {
        $query->where(function ($query) use ($inputs) {
            $keyword = strtolower($inputs['value']);
            $query->where('nama_usaha','like', '%' . $keyword . '%');
        });
      }
      $query->orderBy('id', 'ASC');
      $dt = Datatables::of($query);
      $dt->addColumn('id', function ($row) {
        return $row->id;
      });
      $dt->addColumn('ref', function ($row) {
        return $row->ref;
      });
      $dt->addColumn('nama_usaha', function ($row) {
          return $row->o_member ? $row->o_member->nama_usaha : "";
      });
      $dt->addColumn('nama_pemilik', function ($row) {
        return $row->o_member ? $row->o_member->nama_pemilik : "";
      });
      $dt->addColumn('jumlah_pengajuan', function ($row) {
        return $row->jumlah_pengajuan ? $row->jumlah_pengajuan : "";
      });
      $dt->addColumn('jumlah_disetujui', function ($row) {
        return $row->jumlah_disetujui ? $row->jumlah_disetujui : "";
      });
      $dt->addColumn('color_status_pengajuan', function ($row) {
        return Helpers::getColorStatus($row->status_persetujuan);
      });
      $dt->addColumn('status_pengajuan', function ($row) {
          return Helpers::getStatus($row->status_persetujuan);
      });
      $dt->addColumn('status_lunas', function ($row) {
        return Helpers::getStatusLunas($row->status_lunas);
      });
      $dt->addColumn('color_status_lunas', function ($row) {
        return Helpers::getColorStatusLunas($row->status_lunas);
      });
      $dt->addColumn('delete_url', function ($row) {
        return route("mst.pinjaman.delete", $row->ref);
      });
      $dt->addColumn('created_at', function ($row) {
        return $row->created_at;
      });
      $dt->addColumn('updated_at', function ($row) {
        return $row->updated_at;
      });
      return $dt->make(true);
  }
}
