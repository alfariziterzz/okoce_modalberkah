<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\MesjidModel;
use App\Models\User;
use App\Models\UserRoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class MesjidController extends Controller
{
    public function index(Request $request)
    {
        Helpers::authPermission('Masters.Mesjid.View');
        $action  = request()->get('action');
        if ($request->ajax()) {
            $query  = MesjidModel::with([]);
            $inputs = request()->post('form_search_values');
            if (is_array($inputs)) {
                // print_r($inputs);
                foreach ($inputs as $input) {
                    if ($input['name'] == 'search' && $input['value'] != "") {
                        $query->where(function ($query) use ($input) {
                            $query->where('nama','like', '%' . $input['value'] . '%');
                            $query->orWhere('alamat','like', '%' . $input['value'] . '%');
                        });
                    }
                }
            }
            $query->orderBy('id', 'ASC')->get();
            $totalCount = $query->count();
            $dt = Datatables::of($query);
            $dt->addColumn('ref', function ($row) {
                return $row->ref;
            });
            $dt->addColumn('nama', function ($row) {
                return $row->nama;
            });
            $dt->addColumn('alamat', function ($row) {
                return $row->alamat;
            });
            $dt->addColumn('view_url', function ($row) {
                return route('mst.mesjid.profilemesjid',$row->ref);
            });
            $dt->addColumn('edit_url', function ($row) {
                return route('mst.mesjid.edit',$row->ref);
            });
            $dt->addColumn('delete_url', function ($row) {
                return route("mst.mesjid.delete", $row->ref);
            });
            $dt->addColumn('register_url', function ($row) {
                return route("member.register", $row->ref);
            });
            
            $dt->addIndexColumn();
            // dd($dt);
            return $dt->make(true);
        }
        return view('mesjid/index',
        [
            'title'=>"Mesjid"
        ]);
    }
    public function profile(Request $request)
    {
        $user = Auth::guard('web')->user();
        $mesjid = MesjidModel::where("id",$user['mesjid_id'])->get()->first();
        return view('mesjid/profile',
        [
            'title'=>"Profile Mesjid",
            'dataMesjid'=>$mesjid,
            'dataUser'=>$user,
        ]);
    }
    public function profileMesjid($ref,Request $request)
    {
        $mesjid = MesjidModel::where("ref",$ref)->get()->first();
        $user = User::where("mesjid_id",$mesjid->id)->first();
        return view('mesjid/profilemesjid',
        [
            'title'=>"Profile Mesjid",
            'dataMesjid'=>$mesjid,
            'dataUser'=>$user,
        ]);
    }
    public function members(Request $request)
    {
        $user = Auth::guard('web')->user();
        $mesjid = MesjidModel::where("id",$user['mesjid_id'])->get()->first();
        return view('mesjid/members',
        [
            'title'=>"Profile Mesjid",
            'dataMesjid'=>$mesjid,
            'dataUser'=>$user,
        ]);
    }
    public function membersmesjid($ref,Request $request)
    {
        $mesjid = MesjidModel::where("ref",$ref)->get()->first();
        $user = User::where("mesjid_id",$mesjid->id)->first();
        return view('mesjid/membersmesjid',
        [
            'title'=>"Profile Mesjid",
            'dataMesjid'=>$mesjid,
            'dataUser'=>$user,
        ]);
    }
    public function pinjaman(Request $request)
    {
        $user = Auth::guard('web')->user();
        $mesjid = MesjidModel::where("id",$user['mesjid_id'])->get()->first();
        return view('mesjid/pinjaman',
        [
            'title'=>"Pinjaman",
            'dataMesjid'=>$mesjid,
            'dataUser'=>$user,
        ]);
    }
    public function pinjamanmesjid($ref,Request $request)
    {
        $mesjid = MesjidModel::where("ref",$ref)->get()->first();
        $user = User::where("mesjid_id",$mesjid->id)->first();
        return view('mesjid/pinjamanmesjid',
        [
            'title'=>"Pinjaman",
            'dataMesjid'=>$mesjid,
            'dataUser'=>$user,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Helpers::authPermission('Masters.Mesjid.Create');
        $record = MesjidModel::where('ref', $request->ref)->get()->first();
        if(!$record){
            $rules = array(
                'nama' => 'required',
                'files' => 'mimes:png,jpg,jpeg|max:2048',
            );
        }else{
            $rules = array(
                'nama' => 'required',
                'files' => 'mimes:png,jpg,jpeg|max:2048',
                'asset_id' => 'required|unique:assets,id,'.$record->id
            );
        }
        $aksi = "Edit data";
        if(!$record){
            $record = new MesjidModel();
            $record->ref = Uuid::uuid4()->toString();
            $aksi = "Tambah data";
            $validator = Validator::make($request->all(), [
                'nama' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'unique:users,email'],
                'auth_username' => ['required', 'string', 'max:255', 'unique:users,username'],
                'password' => ['required', 'string', 'max:255'],
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
        $record->nama = $request->nama;
        $record->alamat = $request->alamat;
        $record->provinsi = $request->provinsi;
        $record->kabupaten = $request->kabupaten;
        $record->latitude = $request->lat;
        $record->longitude = $request->long;
        $record->status = $request->is_active == "on" ? 1 : 0;
        // petugas 1
        $record->nama_1 = $request->nama_1;
        $record->sebagai_1 = $request->sebagai_1;
        $record->no_tlp_1 = $request->no_tlp_1;
        // petugas 2
        $record->nama_2 = $request->nama_2;
        $record->sebagai_2 = $request->sebagai_2;
        $record->no_tlp_2 = $request->no_tlp_2;
        // petugas 3
        $record->nama_3 = $request->nama_3;
        $record->sebagai_3 = $request->sebagai_3;
        $record->no_tlp_3 = $request->no_tlp_3;
        // petugas 4
        $record->nama_4 = $request->nama_4;
        $record->no_tlp_4 = $request->no_tlp_4;
        $record->email = $request->email;
         // lampiran
         $files = $request->file('files');
         if($files){
            if($files->getClientOriginalExtension() == "pdf"){
                if($record->files != ""){
                    $pathlampiran = public_path('assets/lampiran/').$record->files;  // Value is not URL but directory file path
                    if(File::exists($pathlampiran)) {
                        File::delete($pathlampiran);
                    }
                }
                $nama_file = $record->ref."_mesjid.".$files->getClientOriginalExtension();
                $files->move(public_path('assets/lampiran/'),$nama_file);
                $record->files = $nama_file; 
            }
         }
        $record->save();
        $userInsert = User::where("mesjid_id",$record->id)->get();
        if($record and $aksi != "Edit data"){
            $userInsert = new User();
            $userInsert->first_name = $request->nama;
            $userInsert->last_name = "";
            $userInsert->name = $request->nama;
            $userInsert->password = bcrypt($request->password);
            $userInsert->email = $request->email;
            $userInsert->phone = $request->no_tlp_4;
            $userInsert->email_external = $request->email;
            $userInsert->username = $request->auth_username;
            $userInsert->is_active = '1';
            $userInsert->is_external_account = '0';
            $userInsert->ref = Str::uuid();
            $userInsert->activation_code = Str::uuid();
            $userInsert->mesjid_id = $record->id;
            $userInsert->role_id = 2;
            if($userInsert->save()){
                $role = new UserRoleModel();
                $role->role_id = 2;
                $role->user_id = $userInsert->id;
                $role->save();
            }
        }
        // end save log
        $data['message'] = 'sukses';
        $data['url'] = "";
        $data['data'] = $record;
        $data['user'] = $userInsert;
        $data['success'] = true;
        return response()->json($data, 200);
    }
    public function view($ref,Request $request)
    {
        $mesjid = MesjidModel::where("ref",$ref)->get()->first();
        $mesjid->url_lampiran = URL::asset('assets/lampiran/'.$mesjid->files);
        $data['success'] = true;
        $data['data'] = $mesjid;
        
        return response()->json($data, 200);
    }
    public function destroy($ref)
    {
        // Helpers::authPermission('Masters.mesjid.Delete');
        $record = MesjidModel::where("ref",$ref)->get()->first();
        $id_mesjid = $record->id;
        $return = $record->delete();
        $message = "";
        if($return){
            $recordUser = User::where("mesjid_id",$id_mesjid)->get()->first();
            $recordUser->delete();
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
    public function register(Request $request)
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('mesjid.register', ['pageConfigs' => $pageConfigs]);
    }
    public function storeRegister(Request $request)
    {
        $record = MesjidModel::where('ref', $request->ref)->get()->first();
        if(!$record){
            $rules = array(
                'nama' => 'required',
                'alamat' => 'required',
                'provinsi' => 'required',
                'kabupaten' => 'required',
                'lat' => 'required',
                'long' => 'required',
                'nama_1' => 'required',
                'nama_4' => 'required',
                'username' => 'required',
                
                'files' => 'mimes:png,jpg,jpeg|max:2048',
            );
        }else{
            $rules = array(
                'nama' => 'required',
                'files' => 'mimes:png,jpg,jpeg|max:2048',
                'asset_id' => 'required|unique:assets,id,'.$record->id
            );
        }
        $aksi = "Edit data";
        if(!$record){
            $record = new MesjidModel();
            $record->ref = Uuid::uuid4()->toString();
            $aksi = "Tambah data";
            $validator = Validator::make($request->all(), [
                'nama' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255', 'unique:users,email'],
                'provinsi' => ['required', 'string', 'max:255', 'unique:users,email'],
                'kabupaten' => ['required', 'string', 'max:255', 'unique:users,email'],
                'nama_1' => ['required', 'string', 'max:255', 'unique:users,email'],
                'nama_4' => ['required', 'string', 'max:255', 'unique:users,email'],

                'email' => ['required', 'string', 'min:6', 'max:255', 'unique:users,email'],
                'auth_username' => ['required', 'string', 'min:6', 'max:255', 'unique:users,username'],
                'password' => ['required', 'string', 'min:6', 'max:255'],
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
        $record->nama = $request->nama;
        $record->alamat = $request->alamat;
        $record->provinsi = $request->provinsi;
        $record->kabupaten = $request->kabupaten;
        $record->latitude = $request->lat;
        $record->longitude = $request->long;
        $record->status = $request->is_active == 0;
        // petugas 1
        $record->nama_1 = $request->nama_1;
        $record->sebagai_1 = $request->sebagai_1;
        $record->no_tlp_1 = $request->no_tlp_1;
        // petugas 2
        $record->nama_2 = $request->nama_2;
        $record->sebagai_2 = $request->sebagai_2;
        $record->no_tlp_2 = $request->no_tlp_2;
        // petugas 3
        $record->nama_3 = $request->nama_3;
        $record->sebagai_3 = $request->sebagai_3;
        $record->no_tlp_3 = $request->no_tlp_3;
        // petugas 4
        $record->nama_4 = $request->nama_4;
        $record->no_tlp_4 = $request->no_tlp_4;
        $record->email = $request->email;
         // lampiran
         $files = $request->file('files');
         if($files){
            if($files->getClientOriginalExtension() == "pdf"){
                if($record->files != ""){
                    $pathlampiran = public_path('assets/lampiran/').$record->files;  // Value is not URL but directory file path
                    if(File::exists($pathlampiran)) {
                        File::delete($pathlampiran);
                    }
                }
                $nama_file = $record->ref."_mesjid.".$files->getClientOriginalExtension();
                $files->move(public_path('assets/lampiran/'),$nama_file);
                $record->files = $nama_file; 
            }
         }
        $record->save();
        $userInsert = User::where("mesjid_id",$record->id)->get();
        if($record and $aksi != "Edit data"){
            $userInsert = new User();
            $userInsert->first_name = $request->nama;
            $userInsert->last_name = "";
            $userInsert->name = $request->nama;
            $userInsert->password = bcrypt($request->password);
            $userInsert->email = $request->email;
            $userInsert->phone = $request->no_tlp_4;
            $userInsert->email_external = $request->email;
            $userInsert->username = $request->auth_username;
            $userInsert->is_active = '1';
            $userInsert->is_external_account = '0';
            $userInsert->ref = Str::uuid();
            $userInsert->activation_code = Str::uuid();
            $userInsert->mesjid_id = $record->id;
            $userInsert->role_id = 2;
            if($userInsert->save()){
                $role = new UserRoleModel();
                $role->role_id = 2;
                $role->user_id = $userInsert->id;
                $role->save();
            }
        }
        // end save log
        $data['message'] = 'sukses';
        $data['url'] = "";
        $data['data'] = $record;
        $data['user'] = $userInsert;
        $data['success'] = true;
        return response()->json($data, 200);
    }
    public function findJumlahall(Request $request)
    {
        $jmlMesjid = MesjidModel::get()->count();
        $json = array('jumlah'=>$jmlMesjid);
        return json_encode($json);
    }
}
