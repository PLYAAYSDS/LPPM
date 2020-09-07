<?php

namespace App\Http\Controllers;
use DB;
use App\bidang_penelitian;
use App\dokumen_proposal;;
use App\lppm_proposal;
use App\tujuan_sosial_ekonomi;
use App\jenis_penelitian;
use App\luaran;
use App\Pegawai;
use App\Reviewer;
use App\penilaian;
use App\kuesioner;
use App\proposal_penelitian;
use Illuminate\Http\Request;

class KuesionerControler extends Controller
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
    

    public function getKuesioner($id)
    {
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $totalPerbaikan = lppm_proposal::where('proposal_penelitian_id', $id)->count('proposal_id');
        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_anggota_dosen
        ON lppm.lppm_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_anggota_dosen.proposal_penelitian_id = '.$id);
        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_anggota_staff_pengajar
        ON lppm.lppm_anggota_staff_pengajar.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_anggota_staff_pengajar.proposal_penelitian_id ='.$id);
        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_anggota_non_dosen
        ON lppm.lppm_anggota_non_dosen.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_anggota_non_dosen.proposal_penelitian_id ='.$id);
        $dokumen = dokumen_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_dokumen_proposal_penelitian.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_dokumen_proposal_penelitian.dokumen_proposal_penelitian', 'lppm_dokumen_proposal_penelitian.dokumen_tipe')->get();
        $propRAB = lppm_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_proposal.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_proposal.proposal_file', 'lppm_proposal.proposal_RAB')->orderby('proposal_id','desc')->first();
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        $kuesioners = kuesioner::all();
        return view('kuesioner',compact('kuesioners','penelitian','dokumen','propRAB','totalPerbaikan',['anggotaDosen'],['dosen'],['staff'],['mahasiswa']));
        // return view('kuesioner',compact('kuesioners'));
    }

    public function finalReview($id){
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $anggotaDosen = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_anggota_dosen
        ON lppm.lppm_anggota_dosen.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_anggota_dosen.proposal_penelitian_id = '.$id);
        $staff = DB::select('select cis_production_clone2.hrdx_pegawai.nama
        from cis_production_clone2.hrdx_pegawai
        JOIN lppm.lppm_anggota_staff_pengajar
        ON lppm.lppm_anggota_staff_pengajar.pegawai_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_anggota_staff_pengajar.proposal_penelitian_id ='.$id);
        $mahasiswa = DB::select('select cis_production_clone2.dimx_dim.nama
        from cis_production_clone2.dimx_dim
        JOIN lppm.lppm_anggota_non_dosen
        ON lppm.lppm_anggota_non_dosen.dim_id = cis_production_clone2.dimx_dim.dim_id
        where lppm.lppm_anggota_non_dosen.proposal_penelitian_id ='.$id);
        $dokumen = dokumen_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_dokumen_proposal_penelitian.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_dokumen_proposal_penelitian.dokumen_proposal_penelitian', 'lppm_dokumen_proposal_penelitian.dokumen_tipe')->get();
        $propRAB = lppm_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_proposal.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_proposal.proposal_file', 'lppm_proposal.proposal_RAB')->first();
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        $kuesioners = kuesioner::all();
        return view('finalReview',compact('kuesioners','penelitian','dokumen','propRAB',['anggotaDosen'],['dosen'],['staff'],['mahasiswa']));
    }
    
    public function getDash(){
        $kuesioner = kuesioner::all();
        $persentase = kuesioner::sum('kuesioner_persentase');
        return view('kuesionerhome',compact('kuesioner','persentase'));
        // return response($persentase);
    }

    public function insertKuseioner(Request $request){
        $kuesioner = new kuesioner();
        $kuesioner->kuesioner_kuesioner = $request->input('kuesioner');
        $kuesioner->kuesioner_persentase = $request->input('persentase');
        $kuesioner->save();
        
        // return view('kuesionerhome',compact('kuesioner','persentase'));
        return redirect('/kuesionerhome');
    }

    public function index()
    {

        $areaList = bidang_penelitian::select('id','nama')->get();
        $jenispenelitian = jenis_penelitian::select('id','jenis_penelitian')->get();
        $luaran = luaran::select('id','nama')->get();
     

        return view('Penelitian', compact(['areaList','jenispenelitian','luaran']));
       
        //return view('index', compact('areaList'));
    }

    public function makeScore(Request $request, $id){
        $dosen = auth()->user()->id;
        $reviewer = Reviewer::select('reviewer_id','status_id')->Where('dosen_id', $dosen)->Where('proposal_penelitian_id', $id)->first();
        $idx = 0;

        if($reviewer->status_id == 8){
            penilaian::where('reviewer_id', $reviewer->reviewer_id)->delete();
            
            // foreach($delete AS $del){
            //     echo $del->penilaian_id;
            //     die();
            //     penilaian::find('penilaian_id', $del->penilaian_id)->delete();
            // }
        }
        foreach ($request["kuesion_id"] as $pertanyaan){
            echo $pertanyaan;
            $bagi = explode('#', $pertanyaan);
            echo '<br>'.$bagi[0];
            echo '<br>'.$bagi[1];
            $modelJawaban = new penilaian();
            
            $modelJawaban->reviewer_id = $reviewer->reviewer_id;
            $modelJawaban->kuesioner_id = $bagi[0];
            $modelJawaban->persentase = $bagi[1];
            $modelJawaban->save();
        }
        
        switch ($request->input('status')) {
            case 'Diterima': 
                $reviewer->reviewer_komentar = $request->input('alasan');
                $reviewer->status_id = 2;
                $reviewer->save();
                break;
    
            case 'Ditolak':
                $reviewer->reviewer_komentar = $request->input('alasan');
                $reviewer->status_id = 3;
                $reviewer->save();
                break;
                
            case 'Perbaikan':
                $reviewer->reviewer_komentar = $request->input('alasan');
                $reviewer->status_id = 4;
                $reviewer->save();
                break;
                
        }

        
        $firstReviewer = Reviewer::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_reviewer.proposal_penelitian_id')
        ->Where('lppm_proposal_penelitian.proposal_penelitian_id',$id)->select('lppm_reviewer.dosen_id','lppm_reviewer.status_id')->first();

        $secondReviewer = Reviewer::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_reviewer.proposal_penelitian_id')
        ->Where('lppm_proposal_penelitian.proposal_penelitian_id',$id)->select('lppm_reviewer.dosen_id','lppm_reviewer.status_id')->orderBy('lppm_reviewer.reviewer_id','desc')->first();
        
        if($dosen == $firstReviewer->dosen_id){
            $dokumen = lppm_proposal::where('proposal_penelitian_id',$id)->orderby('proposal_id','desc')->first();
            if($firstReviewer->status_id == 4){
                $dokumen->proposal_reviewer_1 = $id;
                $dokumen->proposal_reviewer_1_comment = $request->input('alasan');
                $dokumen->proposal_reviewer_1_perbaikan = 1;
                $dokumen->save();
            }else{
                $dokumen->proposal_reviewer_1 = $id;
                $dokumen->proposal_reviewer_1_comment = $request->input('alasan');
                $dokumen->save();
            }
        }else if($dosen == $secondReviewer->dosen_id){
            $dokumen = lppm_proposal::where('proposal_penelitian_id',$id)->orderby('proposal_id','desc')->first();
            if($secondReviewer->status_id == 4){
                $dokumen->proposal_reviewer_2 = $id;
                $dokumen->proposal_reviewer_2_comment = $request->input('alasan');
                $dokumen->proposal_reviewer_2_perbaikan = 1;
                $dokumen->save();
            }else{
                $dokumen->proposal_reviewer_2 = $id;
                $dokumen->proposal_reviewer_2_comment = $request->input('alasan');
                $dokumen->save();
            }
        }

        $proposalReviewer = Reviewer::select("reviewer_id","status_id")->where("proposal_penelitian_id", $id)->get();
        $sudahReview = 0;
        $belumReview = 0;
        $diterima = 0;
        $perbaikan = 0;
        $ditolak = 0;

        foreach($proposalReviewer AS $prop){
            if($prop->status_id > 1){
                if($prop->status_id == 2){
                    $sudahReview += 1;
                    $diterima += 1;
                }else if($prop->status_id == 3){
                    $sudahReview += 1;
                    $ditolak += 1;
                }else if($prop->status_id == 4){
                    $sudahReview += 1;
                    $perbaikan += 1;
                }
                
            }else if($prop->status_id == 1){
                $belumReview += 1;
            }
        }

        if($sudahReview == 2){
            if($perbaikan == 0){
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 9;
                    
                $data->save();
            }else{
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 12;
                    
                $data->save();
            }
        }
        

        return redirect('/reviewerhome');
        // $data = new penilaian();
        // $data->persentase = $request->input('skor');
        // $data->save();
    }


}