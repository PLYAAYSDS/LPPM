<?php

namespace App\Http\Controllers;
use DB;
use App\bidang_penelitian;
use App\tujuan_sosial_ekonomi;
use App\proposal_penelitian;
use App\dokumen_proposal;
use App\lppm_proposal;
use App\jenis_penelitian;
use App\lppm_anggota_non_dosen;
use App\lppm_anggota_dosen;
use App\lppm_anggota_staff_pengajar;
use App\luaran;
use App\Pegawai;
use App\Reviewer;
use App\Mahasiswa;
use App\TagList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\str;

class PengajuanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    
    public function index()
    {

        $bidang = bidang_penelitian::select('bidang_penelitian_id','bidang_penelitian_nama')->get();
        $bidang1 = bidang_penelitian::select('bidang_penelitian_id','bidang_penelitian_nama')->get();

        $jenispenelitian = jenis_penelitian::select('jenis_penelitian_id','jenis_penelitian_nama')->get();
        //$luaran = luaran::select('id','nama')->get();
        $tujuan_sosial_ekonomi = tujuan_sosial_ekonomi::select('tujuan_sosial_ekonomi_id','tujuan_sosial_ekonomi_nama')->get();
     
        //Untuk Mahasiswa dan Dosen
        $mahasiswa = Mahasiswa::select('dim_id','nama')->where('status_akhir','=','Aktif')->get();
        $dosen = Pegawai::select('pegawai_id','nama')->where('status_akhir','=','A')->get();
        $pegawai = Pegawai::select('pegawai_id','nama')->whereNull('status_akhir')->get();

        //Untuk anggota penelitian
        $anggota_non_dosen = lppm_anggota_non_dosen::select('proposal_penelitian_id','anggota_non_dosen_id','dim_id')->get();
        $anggota_dosen = lppm_anggota_dosen::select('proposal_penelitian_id','angggota_dosen_id','dosen_id')->get();
        $anggota_staff_pengajar = lppm_anggota_staff_pengajar::select('proposal_penelitian_id','anggota_staff_pengajar_id','pegawai_id')->get();


        return view('penelitian', compact(['bidang','bidang1','jenispenelitian','tujuan_sosial_ekonomi','mahasiswa','dosen','pegawai','anggota_dosen','anggota_non_dosen','anggota_staff_pengajar']));
       
        //return view('index', compact('areaList'));
    }

    public function editProposal($id)
    {
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        //$kuesioners = kuesioner::all();
        //Untuk Mahasiswa dan Dosen
        $mahasiswa = Mahasiswa::select('dim_id','nama')->where('status_akhir','=','Aktif')->get();
        $dosen = Pegawai::select('pegawai_id','nama')->where('status_akhir','=','A')->get();
        $pegawai = Pegawai::select('pegawai_id','nama')->whereNull('status_akhir')->get();

        //data penelitian
        $bidang = bidang_penelitian::select('bidang_penelitian_id','bidang_penelitian_nama')->get();
        $jenispenelitian = jenis_penelitian::select('jenis_penelitian_id','jenis_penelitian_nama')->get();
        $tujuan_sosial_ekonomi = tujuan_sosial_ekonomi::select('tujuan_sosial_ekonomi_id','tujuan_sosial_ekonomi_nama')->get();

        //Untuk anggota penelitian
        $anggota_non_dosen = lppm_anggota_non_dosen::select('proposal_penelitian_id','anggota_non_dosen_id','dim_id')->get();
        $anggota_dosen = lppm_anggota_dosen::select('proposal_penelitian_id','angggota_dosen_id','dosen_id')->get();
        $anggota_staff_pengajar = lppm_anggota_staff_pengajar::select('proposal_penelitian_id','anggota_staff_pengajar_id','pegawai_id')->get();
        //$getfile =


        //data table anggota
        $datamahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama, lppm.lppm_anggota_non_dosen.anggota_non_dosen_id
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_anggota_non_dosen
        ON lppm.lppm_anggota_non_dosen.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_anggota_non_dosen.proposal_penelitian_id ='.$id);

        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama, lppm.lppm_anggota_staff_pengajar.anggota_staff_pengajar_id
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_anggota_staff_pengajar
        ON lppm.lppm_anggota_staff_pengajar.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_anggota_staff_pengajar.proposal_penelitian_id ='.$id);

        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama, lppm.lppm_anggota_dosen.angggota_dosen_id
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_anggota_dosen
        ON lppm.lppm_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_anggota_dosen.proposal_penelitian_id = '.$id);

        return view('updateProposal',compact('penelitian','mahasiswa','dosen','pegawai','bidang','jenispenelitian','tujuan_sosial_ekonomi','anggota_non_dosen','anggota_dosen','anggota_staff_pengajar','datamahasiswa','staff','anggotaDosen'));
        // return view('kuesioner',compact('kuesioners'));
    }

    public function insertform()
    {
        return view('stud_create');
    }

    public function insertReviewer(Request $request, $id){
        $Rev1 = new Reviewer();

        $Rev1->dosen_id = $request->input('dosen1');
        $Rev1->proposal_penelitian_id = $id;
        $Rev1->save();

        $Rev2 = new Reviewer();

        $Rev2->dosen_id = $request->input('dosen2');
        $Rev2->proposal_penelitian_id = $id;
        $Rev2->save();
        
        $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $data->status_id = 5;
    
        $data->save();

        $dosen = Pegawai::select('pegawai_id','nama')->get();
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        
        return view('detailpenelitian',compact('penelitian',['dosen']));
    }

    public function insert(Request $request)
    {
        
        $baseRab  = "../public/uploadRab/";
        $fileRab = $request->file('Rab');
        $pathRab = $fileRab->getClientOriginalName();
        $respRab = $fileRab->move('uploadRab',$pathRab);
       
        $basePro  = "../public/uploadProposal/";
        $file = $request->file('Proposal');
        $pathPro = $file->getClientOriginalName();
        $respPro = $file->move('uploadProposal',$pathPro);

        $date = date('Y');
        
        $dosen = auth()->user()->id;
        $proposal = new proposal_penelitian();

        $nama = $request->input('judul');

        $proposal->jenis_penelitian_id = $request->input('jenis');
        $proposal->proposal_penelitian_judul = $request->input('judul');
        $proposal->bidang_penelitian_id = $request->input('bidang');
        $proposal->tujuan_sosial_ekonomi_id = $request->input('tujuan');
        $proposal->dosen_id = $dosen;

        $proposal->proposal_penelitian_jumlah_dana = $request->input('dana');

        $proposal->proposal_penelitian_ketua = $request->input('ketua');
        $tahun = $request->input('tahun');
        $proposal->proposal_penelitian_tahun_diajukan = $tahun;
        $tahun1 = $request->input('tahun1');
        $proposal->proposal_penelitian_tahun_dilaksanakan = $tahun1;
        // $proposal->proposal_penelitian_RAB = $pathRab;
        // $proposal->proposal_penelitian_proposal = $pathPro;
        if($date > $tahun){
            $proposal->status_id = 13;
        }else{
            $proposal->status_id = 1;
        }
        // $proposal = $request->input('jumlahmahasiswa');
        // $proposal = $request->input('luaran');
        $proposal->save();


        $id = proposal_penelitian::select("proposal_penelitian_id","status_id")->where('proposal_penelitian_judul','=',$nama)->first();
        $id->proposal_penelitian_id;
        
        $dokumen = new lppm_proposal();
        $dokumen->proposal_penelitian_id = $id->proposal_penelitian_id;
        $dokumen->proposal_file = $pathPro;
        $dokumen->proposal_RAB = $pathRab;
        $dokumen->save();

        if($id->status_id = 13){
            if($request->file('dokumen')!=null){
                $baseFinal  = "../public/uploadAkhir/";
                $fileFinal = $request->file('dokumen');
                $pathFinal = $fileFinal->getClientOriginalName();
                $respFinal = $fileFinal->move('uploadFinal',$pathFinal);
                
                $dokumen = new dokumen_proposal();
    
                $dokumen->proposal_penelitian_id = $id->proposal_penelitian_id;
                $dokumen->dokumen_proposal_penelitian = $pathFinal;
                $dokumen->dokumen_tipe = 'Laporan Akhir';
                $dokumen->save();
            }
        }
      

        $rules = [];


        foreach($request->input('mahasiswa') as $key => $value) {
            $rules["mahasiswa.{$key}"] = 'required' ;
        }
        foreach($request->input('dosen') as $key => $value) {
            $rules["dosen.{$key}"] = 'required' ;
        }

        foreach($request->input('pegawai') as $key => $value) {
            $rules["pegawai.{$key}"] = 'required' ;
        }

        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


            foreach($request->input('mahasiswa') as $key => $value) {
                $tag = new lppm_anggota_non_dosen();
                $tag->dim_id = $value;
                $tag->proposal_penelitian_id = $id->proposal_penelitian_id;
                $tag->save();   
                // TagList::create(['pen_id'=>$id->proposal_penelitian_id]);

            }
            foreach($request->input('dosen') as $key => $value) {
                $tag = new lppm_anggota_dosen();
                $tag->dosen_id = $value;
                $tag->proposal_penelitian_id = $id->proposal_penelitian_id;
                $tag->save();
                // TagList::create(['name'=>$value]);
                // TagList::create(['pen_id'=>$id->proposal_penelitian_id]);

            }
            foreach($request->input('pegawai') as $key => $value) {
                $tag = new lppm_anggota_staff_pengajar();
                $tag->pegawai_id = $value;
                $tag->proposal_penelitian_id = $id->proposal_penelitian_id;
                $tag->save();   
                // TagList::create(['pen_id'=>$id->proposal_penelitian_id]);

            }


            
        }
        

        // return response()->json(['error'=>$validator->errors()->all()]);
        return redirect('/penelitian');

    }


    public function update(Request $request, $id){
        $baseRab  = "../public/uploadRab/";
        $fileRab = $request->file('Rab');
        $pathRab = $fileRab->getClientOriginalName();
        $respRab = $fileRab->move('uploadRab',$pathRab);
    


          $basePro  = "../public/uploadProposal/";
          $file = $request->file('Proposal');
          $pathPro = $file->getClientOriginalName();
          $respPro = $file->move('uploadProposal',$pathPro);

        $date = date('Y');
        
        $proposal = proposal_penelitian::where('proposal_penelitian_id',$id)->first();

        $nama = $request->input('judul');

        $proposal->jenis_penelitian_id = $request->input('jenis');
        $proposal->proposal_penelitian_judul = $request->input('judul');
        $proposal->bidang_penelitian_id = $request->input('bidang');
        $proposal->tujuan_sosial_ekonomi_id = $request->input('tujuan');

        $proposal->proposal_penelitian_jumlah_dana = $request->input('dana');


        $proposal->proposal_penelitian_ketua = $request->input('ketua');
        $tahun = $request->input('tahun');
        $proposal->proposal_penelitian_tahun_diajukan = $tahun;
        $tahun1 = $request->input('tahun1');
        $proposal->proposal_penelitian_tahun_dilaksanakan = $tahun1;
        // $proposal->proposal_penelitian_RAB = $pathRab;
        // $proposal->proposal_penelitian_proposal = $pathPro;
        if($date > $tahun){
            $proposal->status_id = 8;
        }else{
            $proposal->status_id = 1;
        }
        $proposal->save();

        $dokumen = lppm_proposal::where('proposal_penelitian_id',$id)->first();
        $dokumen->proposal_file = $pathPro;
        $dokumen->proposal_RAB = $pathRab;
        $dokumen->save();

        
        $id = proposal_penelitian::select("proposal_penelitian_id")->where('proposal_penelitian_judul','=',$nama)->first();
        $id->proposal_penelitian_id;

        $rules = [];


        foreach($request->input('mahasiswa') as $key => $value) {
            $rules["mahasiswa.{$key}"] = '' ;
        }
        foreach($request->input('dosen') as $key => $value) {
            $rules["dosen.{$key}"] = '' ;
        }

        foreach($request->input('pegawai') as $key => $value) {
            $rules["pegawai.{$key}"] = '' ;
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {

            if($request->input('mahasiswa')[0] != ""){
                foreach($request->input('mahasiswa') as $key => $value) {
                    $tag = new lppm_anggota_non_dosen();
                    $tag->dim_id = $value;
                    $tag->proposal_penelitian_id = $id->proposal_penelitian_id;
                    $tag->save(); 
                }
            }
            
            if($request->input('dosen')[0] != ""){
                foreach($request->input('dosen') as $key => $value) {
                    $tag = new lppm_anggota_dosen();
                    $tag->dosen_id = $value;
                    $tag->proposal_penelitian_id = $id->proposal_penelitian_id;
                    $tag->save();
                }

            }

            if($request->input('pegawai')[0] != ""){
                foreach($request->input('pegawai') as $key => $value) {
                    $tag = new lppm_anggota_staff_pengajar();
                    $tag->pegawai_id = $value;
                    $tag->proposal_penelitian_id = $id->proposal_penelitian_id;
                    $tag->save();       
                }

            }


             //return response()->json(['success'=>'done']);
            // return view("addMore");
            //return view('penelitian', compact(['bidang','jenispenelitian','tujuan_sosial_ekonomi','areaList','mahasiswa','dosen']));
            // return addMore();
            
        }
        

        // return response()->json(['error'=>$validator->errors()->all()]);
        return redirect('/penelitian');

    }

    public function create(Request $request)
    {

        $bidang = bidang_penelitian::select('bidang_penelitian_id','bidang_penelitian_nama')->get();
        $jenispenelitian = jenis_penelitian::select('jenis_penelitian_id','jenis_penelitian_nama')->get();
        //$luaran = luaran::select('id','nama')->get();
        $tujuan_sosial_ekonomi = tujuan_sosial_ekonomi::select('tujuan_sosial_ekonomi_id','tujuan_sosial_ekonomi_nama')->get();

        $mahasiswa = Mahasiswa::select('dim_id', 'nama')->get();
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        $rules = [];


        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required' ;
        }
        foreach($request->input('dosen') as $key => $value) {
            $rules["dosen.{$key}"] = 'required' ;
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


            foreach($request->input('name') as $key => $value) {
                TagList::create(['name'=>$value]);
            }
            foreach($request->input('dosen') as $key => $value) {
                TagList::create(['name'=>$value]);
            }


             //return response()->json(['success'=>'done']);
            // return view("addMore");
            return view('penelitian', compact(['bidang','jenispenelitian','tujuan_sosial_ekonomi','areaList','mahasiswa','dosen']));
            // return addMore();
            
        }
        

        return response()->json(['error'=>$validator->errors()->all()]);
        
    }

    public function deleteData($id){
        lppm_anggota_dosen::where("angggota_dosen_id",$id)->delete();
        
        return redirect()->back();
    }

    public function deleteStaff($id){
        lppm_anggota_staff_pengajar::where("anggota_staff_pengajar_id",$id)->delete();
        
        return redirect()->back();
    }

    public function deleteMahasiswa($id){
        lppm_anggota_non_dosen::where("anggota_non_dosen_id",$id)->delete();
        
        return redirect()->back();
    }

}
