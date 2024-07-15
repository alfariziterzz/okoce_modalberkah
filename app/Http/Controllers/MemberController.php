<?php

namespace App\Http\Controllers;

use App\Models\JenisUsahaModel;
use App\Models\MemberModel;
use App\Models\MesjidModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Datatables;
class MemberController extends Controller
{
    //
    public function index(Request $request)
    {
      return view('member/membersall', []);
    }
    public function register($ref,Request $request)
    {
        $mesjid = MesjidModel::where("ref",$ref)->get()->first();
        $jenisUsaha = JenisUsahaModel::get();
        $pageConfigs = ['myLayout' => 'blank'];
        return view('member.register', ['pageConfigs' => $pageConfigs,'dataMesjid' => $mesjid,'jenisUsaha' => $jenisUsaha]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Helper::authPermission('Masters.Assets.Create');
        $record = MemberModel::where('ref', $request->ref)->get()->first();
        $aksi = "Edit data";
        if(!$record){
            $record = new MemberModel();
            $record->ref = Uuid::uuid4()->toString();
            $aksi = "Tambah data";
            $validator = Validator::make($request->all(), [
                'nama_usaha' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'unique:users,email'],
                'username' => ['required', 'string', 'min:6', 'max:255', 'unique:users,username'],
                'password' => ['required', 'string', 'min:6','max:255'],
                'alamat_lengkap' => 'required',
                'nama_pemilik' => 'required',
                'jenis_usaha' => 'required',
                'provinsi' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'status_tempat' => 'required',
                'badan_usaha' => 'required',
                'npwp_pelaporan' => 'required',
                'no_ponsel' => 'required'
              ]);
          
              if ($validator->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Invalid params passed', // the ,message you want to show
                      'errors' => $validator->errors()
                  ], 422);
              }
        }
       
        $recordUser = "";
        $record->nama_usaha = $request->nama_usaha;
        $record->alamat_lengkap = $request->alamat_lengkap;
        $record->nama_pemilik = $request->nama_pemilik;
        $record->jenis_usaha = $request->jenis_usaha ? $request->jenis_usaha : null;
        $record->provinsi = $request->provinsi;
        $record->kabupaten = $request->kabupaten;
        $record->kecamatan = $request->kecamatan;
        $record->kelurahan = $request->kelurahan;
        $record->rt = $request->rt;
        $record->rw = $request->rw;
        $record->status_tempat = $request->status_tempat;
        $record->badan_usaha = $request->badan_usaha;
        $record->npwp_pelaporan = $request->npwp_pelaporan;
        $record->laporan_keuangan = $request->laporan_keuangan;
        $record->laporan_laba_rugi = $request->laporan_laba_rugi ? $request->laporan_laba_rugi : null;
        $record->laporan_neraca = $request->laporan_neraca ? $request->laporan_neraca : null;
        $record->laporan_arus_kas = $request->laporan_arus_kas ? $request->laporan_arus_kas : null;
        $record->akses_permodalan = $request->akses_permodalan ? $request->akses_permodalan : null;
        $record->no_ponsel = $request->no_ponsel ? $request->no_ponsel : null;
        $record->mulai_beroperasi = $request->mulai_beroperasi ? Carbon::createFromFormat('d-m-Y', $request->mulai_beroperasi)->format('Y-m-d') : null;
        $record->ref_mesjid = $request->ref_mesjid;
        $record->email = $request->email;
        $record->save();
        $userInsert = User::where("mesjid_id",$record->id)->get();
        if($record and $aksi != "Edit data"){
            $userInsert = new User();
            $userInsert->first_name = $request->nama_usaha;
            $userInsert->last_name = "";
            $userInsert->name = $request->nama_usaha;
            $userInsert->password = bcrypt($request->password);
            $userInsert->email = $request->email;
            $userInsert->phone = $request->no_ponsel;
            $userInsert->email_external = $request->email;
            $userInsert->username = $request->auth_username;
            $userInsert->is_active = '1';
            $userInsert->is_external_account = '0';
            $userInsert->ref = Str::uuid();
            $userInsert->activation_code = Str::uuid();
            $userInsert->mesjid_id = $record->id;
            $userInsert->role_id = 3;
            $userInsert->save();
        }

        // end save log
        $data['message'] = 'sukses';
        $data['url'] = route('pages-landing');
        $data['data'] = $record;
        $data['user'] = $userInsert;
        $data['success'] = true;
        return response()->json($data, 200);
    }
    public function findJumlah($ref,Request $request)
    {
        $jmlMesjid = MemberModel::where("ref_mesjid",$ref)->get()->count();
        $json = array('jumlah'=>$jmlMesjid);
        return json_encode($json);
    }
    public function findJumlahall(Request $request)
    {
        $jmlMesjid = MemberModel::get()->count();
        $json = array('jumlah'=>$jmlMesjid);
        return json_encode($json);
    }
    public function getDatatable($ref_mesjid,Request $request)
    {
          $query  = MemberModel::where("ref_mesjid",$ref_mesjid)->orderBy('id', 'ASC');
          $query->orderBy('id', 'ASC');
          $dt = Datatables::of($query);
          $dt->addColumn('id', function ($row) {
            return $row->id;
          });
          $dt->addColumn('ref', function ($row) {
            return $row->ref;
          });
          $dt->addColumn('nama_usaha', function ($row) {
            return $row->nama_usaha;
          });
          $dt->addColumn('nama_pemilik', function ($row) {
            return $row->nama_pemilik;
          });
          
          $dt->addColumn('created_at', function ($row) {
            return $row->created_at;
          });
          $dt->addColumn('updated_at', function ($row) {
            return $row->updated_at;
          });
          return $dt->make(true);
      }
    public function getDatatableAll(Request $request)
    {
          $query  = MemberModel::orderBy('id', 'ASC');
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
            return $row->nama_usaha;
          });
          $dt->addColumn('nama_pemilik', function ($row) {
            return $row->nama_pemilik;
          });
          
          $dt->addColumn('created_at', function ($row) {
            return $row->created_at;
          });
          $dt->addColumn('updated_at', function ($row) {
            return $row->updated_at;
          });
          return $dt->make(true);
      }
      public function findAll($ref_mesjid){
        $records = MemberModel::where("ref_mesjid",$ref_mesjid)->get();
        $json = array(); 
        if(isset($records)){
          foreach ($records as $record) :
            $json['id'][] = $record->ref;
            $json['text'][] = $record->nama_usaha;
          endforeach;
        }
        return json_encode($json);
      }
      public function finJenisUsahadAll(){
        $records = JenisUsahaModel::get();
        $json = array(); 
        if(isset($records)){
          foreach ($records as $record) :
            $json['id'][] = $record->id;
            $json['text'][] = $record->nama_jenis;
          endforeach;
        }
        return json_encode($json);
    }
    public function view(Request $request,$ref)
    {
        $recordMember = MemberModel::where("ref",$ref)->get()->first();
        $data['success'] = true;
        $data['data'] = $recordMember;
        
        return response()->json($data, 200);
    }
}
