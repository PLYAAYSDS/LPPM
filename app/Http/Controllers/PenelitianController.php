<?php

namespace App\Http\Controllers;
use DB;
use App\bidang_penelitian;
use App\dokumen_proposal;;
use App\lppm_proposal;
use App\proposal_penelitian;
use App\tujuan_sosial_ekonomi;
use App\penilaian_laporan_akhir;
use App\jenis_penelitian;
use App\luaran;
use App\penilaian;
use App\Pegawai;
use App\Reviewer;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class PenelitianController extends Controller
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
    
    public function getDashb(){
        // $penelitian = proposal_penelitian::all();
        $idUser= auth()->user()->id;
        $penelitian = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id != 8 AND lppm.lppm_proposal_penelitian.status_id < 10 AND dosen_id = '.$idUser);
        $penelitianSelesai = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 8 AND dosen_id = '.$idUser);
        $penelitianDitolak = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 3 OR lppm.lppm_proposal_penelitian.status_id = 11 AND dosen_id = '.$idUser);
        $penelitianDiperbaiki = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 12 AND dosen_id = '.$idUser);
        $penelitianBerjalan = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 10 OR lppm.lppm_proposal_penelitian.status_id > 13 AND dosen_id = '.$idUser);
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('penelitianhome',compact('penelitian','penelitianSelesai','penelitianDitolak','penelitianDiperbaiki','penelitianBerjalan',['dosen']));
    }

    public function getDashbKap(){
        // $penelitian = proposal_penelitian::where('status_id','=','1')->get();
        $penelitian = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 1');
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('penelitianHomeKaprodi',compact('penelitian',['dosen']));
    }

    public function getDashbDek(){
        $penelitian = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 2');
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('penelitianHomeDekan',compact('penelitian',['dosen']));
    }

    public function getDashbLppm(){
        $penelitian = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 4');
        $reviewdone = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 9');  
        $documentation = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 13');        
        $onProgress = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 10 OR lppm.lppm_proposal_penelitian.status_id between 14 AND 16 OR 
        lppm.lppm_proposal_penelitian.status_id between 20 AND 24');       
        $researchDone = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 8');
        $luaran = luaran::where('status_id',17)->get();

        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('penelitianHomeLppm',compact('penelitian','reviewdone','onProgress','researchDone','documentation','luaran',['dosen']));
    }

    public function getDashReviewer(){
        $dosen = auth()->user()->id;
        $penelitian = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
            ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        JOIN lppm.lppm_reviewer
            ON lppm.lppm_proposal_penelitian.proposal_penelitian_id = lppm.lppm_reviewer.proposal_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 5 AND lppm.lppm_reviewer.dosen_id = '.$dosen.'
        AND lppm.lppm_reviewer.status_id = 1 OR lppm.lppm_reviewer.status_id = 8  AND 
        lppm.lppm_proposal_penelitian.status_id = 5 AND lppm.lppm_reviewer.dosen_id ='.$dosen);
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('reviewerhome',compact('penelitian',['dosen']));
    }

    public function getDashReviewerFinal(){
        $dosen = auth()->user()->id;
        $penelitian = DB::select('select lppm.lppm_proposal_penelitian.*, lppm.lppm_r_bidang_penelitian.bidang_penelitian_nama
        from lppm.lppm_proposal_penelitian 
        JOIN lppm.lppm_r_bidang_penelitian
             ON lppm.lppm_proposal_penelitian.bidang_penelitian_id = lppm.lppm_r_bidang_penelitian.bidang_penelitian_id
        JOIN lppm.lppm_reviewer
            ON lppm.lppm_proposal_penelitian.proposal_penelitian_id = lppm.lppm_reviewer.proposal_penelitian_id
        where lppm.lppm_proposal_penelitian.status_id = 21 AND lppm.lppm_reviewer.status_id = 5 AND lppm.lppm_reviewer.dosen_id = '.$dosen);
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('reviewerhomefinal',compact('penelitian',['dosen']));
    }

    public function KaprodiAgreement(Request $request, $id)
    {
        switch ($request->input('status')) {
            case 'Diterima':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 2;
        
                $data->save();
                break;
    
            case 'Ditolak':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 3;
        
                $data->save();
                break;
                
            case 'DiterimaDekan':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 4;
            
                $data->save();
                break;
            
            case 'ProposalDitolak':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 11;
            
                $data->save();
                break;
                
        }
        
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        // return view('detailpenelitian',compact('penelitian',['dosen']));
        return redirect('/detailpenelitiankaprodi/'.$id);
    }

    public function pemeriksaanLaporanKemajuan(Request $request, $id)
    {
        switch ($request->input('status')) {
            case 'Diterima':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 15;
        
                $data->save();
                break;
    
            case 'Ditolak':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 16;
        
                $data->save();
                break;
    
            case 'lanjutKeReviewer':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 21;
        
                $data->save();

                Reviewer::where('proposal_penelitian_id',$id)->update(['status_id' => 5]);

                DB::table('lppm.lppm_reviewer')->where('lppm.lppm_reviewer.proposal_penelitian_id', $id)->update(['status_id' => 5]);
                // $reviewer = Reviewer::where('proposal_penelitian_id', $id);
                // $reviewer->status_id = 2;
                // $reviewer->save();
                break;
                    
            case 'laporanAkhirDiterima':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 8;
        
                $data->save();
                break;
    
            case 'laporanAkhirDitolak':
                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 24;
        
                $data->save();
                break;
        }
        
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        // return view('detailpenelitian',compact('penelitian',['dosen']));
        return redirect('/detailpenelitianlppm/'.$id);
    }

    public function pemberianSK(Request $request, $id)
    {
        switch ($request->input('status')) {
            case 'ProposalDiterima':                
                $baseSK  = "../public/uploadSK/";
                $fileSK = $request->file('dokumen');
                $pathSK = $fileSK->getClientOriginalName();
                $respSK = $fileSK->move('uploadSK',$pathSK);
                 
                $dokumen = new dokumen_proposal();

                $dokumen->proposal_penelitian_id = $id;
                $dokumen->dokumen_proposal_penelitian = $pathSK;
                $dokumen->dokumen_tipe = 'Kontrak';
                $dokumen->save();

                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 10;

                $data->save();

                return redirect('/detailpenelitianlppm/'.$id);
                break;
    
            case 'DokumentasiDiterima':
                $baseFinal  = "../public/uploadKontrak/";
                $fileFinal = $request->file('dokumen');
                $pathFinal = $fileFinal->getClientOriginalName();
                $respFinal = $fileFinal->move('uploadKontrak',$pathFinal);
                    
                $dokumen = new dokumen_proposal();

                $dokumen->proposal_penelitian_id = $id;
                $dokumen->dokumen_proposal_penelitian = $pathFinal;
                $dokumen->dokumen_tipe = 'SK';
                $dokumen->save();

                $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                $data->status_id = 8;

                $data->save();
                return redirect('/detailpenlppm/'.$id);
                break;
    
                case 'DokumentasiDitolak':
                    $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
                    $data->status_id = 11;
    
                    $data->save();
                    return redirect('/detailpenlppm/'.$id);
                    break;
        }
        
    }

    public function getDetail($id){
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
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_proposal.proposal_file', 'lppm_proposal.proposal_RAB','lppm_proposal.proposal_reviewer_1_comment','lppm_proposal.proposal_reviewer_2_comment','lppm_proposal.proposal_reviewer_1_perbaikan','lppm_proposal.proposal_reviewer_2_perbaikan')->orderby('proposal_id','desc')->first();
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('detailpenelitian',compact('penelitian','dokumen','propRAB',['anggotaDosen'],['dosen'],['staff'],['mahasiswa']));
    }

    public function getDetailKaprodi($id){
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
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_proposal.proposal_file', 'lppm_proposal.proposal_RAB','lppm_proposal.proposal_reviewer_1_comment','lppm_proposal.proposal_reviewer_2_comment')->orderby('proposal_id','desc')->first();
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        return view('detailPenelitianKaprodi',compact('penelitian','dokumen','propRAB',['anggotaDosen'],['dosen'],['staff'],['mahasiswa']));
    }

    public function getDetailDekan($id){
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $reviewer = DB::select('select cis_production_clone2.hrdx_pegawai.nama, lppm.lppm_reviewer.status_id
        from cis_production_clone2.hrdx_pegawai 
        JOIN lppm.lppm_reviewer
             ON lppm.lppm_reviewer.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_reviewer.proposal_penelitian_id ='.$id);
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
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        $dokumen = dokumen_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_dokumen_proposal_penelitian.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_dokumen_proposal_penelitian.dokumen_proposal_penelitian', 'lppm_dokumen_proposal_penelitian.dokumen_tipe')->get();
        $propRAB = lppm_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_proposal.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_proposal.proposal_file', 'lppm_proposal.proposal_RAB','lppm_proposal.proposal_reviewer_1_comment','lppm_proposal.proposal_reviewer_2_comment')->orderby('proposal_id','desc')->first();
        return view('detailPenelitianDekan',compact('penelitian','dokumen','propRAB',['anggotaDosen'],['dosen'],['staff'],['mahasiswa']));
    }

    public function getDetailLppm($id){
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $reviewer = DB::select('select cis_production_clone2.hrdx_pegawai.nama, lppm.lppm_reviewer.status_id
        from cis_production_clone2.hrdx_pegawai 
        JOIN lppm.lppm_reviewer
             ON lppm.lppm_reviewer.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_reviewer.proposal_penelitian_id ='.$id);
        $dosen = Pegawai::select('pegawai_id','nama')->get();
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
        $dosen = Pegawai::select('pegawai_id','nama')->get();
        $dokumen = dokumen_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_dokumen_proposal_penelitian.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_dokumen_proposal_penelitian.dokumen_proposal_penelitian', 'lppm_dokumen_proposal_penelitian.dokumen_tipe')->get();
        $propRAB = lppm_proposal::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_proposal.proposal_penelitian_id')
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_proposal.proposal_file', 'lppm_proposal.proposal_RAB','lppm_proposal.proposal_reviewer_1_comment','lppm_proposal.proposal_reviewer_2_comment')->orderby('proposal_id','desc')->first();
        
        $firstReviewer = Reviewer::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_reviewer.proposal_penelitian_id')
        ->Where('lppm_proposal_penelitian.proposal_penelitian_id',$id)->select('lppm_reviewer.reviewer_id','lppm_reviewer.reviewer_komentar','lppm_reviewer.status_id')->first();

        $firstReviewerName = Review::join('lppm.lppm_reviewer','lppm.lppm_reviewer.dosen_id','lppm.users.id')
        ->where('lppm.lppm_reviewer.reviewer_id', $firstReviewer->reviewer_id)
        ->select('lppm.users.name')->first();

        $secondReviewer = Reviewer::join('lppm_proposal_penelitian','lppm_proposal_penelitian.proposal_penelitian_id','lppm_reviewer.proposal_penelitian_id')
        ->Where('lppm_proposal_penelitian.proposal_penelitian_id',$id)->select('lppm_reviewer.reviewer_id','lppm_reviewer.reviewer_komentar','lppm_reviewer.status_id')->orderBy('lppm_reviewer.reviewer_id','desc')->first();

        $secondReviewerName = Review::join('lppm.lppm_reviewer','lppm.lppm_reviewer.dosen_id','lppm.users.id')
        ->where('lppm.lppm_reviewer.reviewer_id', $secondReviewer->reviewer_id)
        ->select('lppm.users.name')->first();
        
        $firstFile = penilaian_laporan_akhir::select('penilaian_laporan_akhir_file')->where('reviewer_id', $firstReviewer->reviewer_id)->first();
        $secondFile = penilaian_laporan_akhir::select('penilaian_laporan_akhir_file')->where('reviewer_id', $secondReviewer->reviewer_id)->first();

        $firstName = $firstReviewerName->name;
        $secondName = $secondReviewerName->name;

        if($firstFile != null){
            $filePertama = $firstFile->penilaian_laporan_akhir_file;
        }else{
            $filePertama = "belum ada";
        }
        if($secondFile != null){
            $fileKedua = $secondFile->penilaian_laporan_akhir_file;
        }else{
            $fileKedua = "belum ada";
        }
        // $fileKedua = $secondFile->penilaian_laporan_akhir_file;

        $hasilPertama = penilaian::join('lppm_kuesioner','lppm_kuesioner.kuesioner_id','lppm_penilaian.kuesioner_id')
        ->where('lppm_penilaian.reviewer_id',$firstReviewer->reviewer_id)
        ->select('lppm_kuesioner.kuesioner_kuesioner','lppm_kuesioner.kuesioner_persentase','lppm_penilaian.persentase')->get();

        $hasilKedua = penilaian::join('lppm_kuesioner','lppm_kuesioner.kuesioner_id','lppm_penilaian.kuesioner_id')
        ->where('lppm_penilaian.reviewer_id',$secondReviewer->reviewer_id)
        ->select('lppm_kuesioner.kuesioner_kuesioner','lppm_kuesioner.kuesioner_persentase','lppm_penilaian.persentase')->get();


        return view('detailpenelitianLppm',compact('penelitian','firstReviewer','secondReviewer','firstName','secondName','hasilPertama','hasilKedua','filePertama','fileKedua',['reviewer'],'propRAB','dokumen',['anggotaDosen'],['dosen'],['staff'],['mahasiswa']));
    }

    public function getDetLppm($id){
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $reviewer = DB::select('select cis_production_clone2.hrdx_pegawai.nama, lppm.lppm_reviewer.status_id
        from cis_production_clone2.hrdx_pegawai 
        JOIN lppm.lppm_reviewer
             ON lppm.lppm_reviewer.dosen_id = cis_production_clone2.hrdx_pegawai.pegawai_id
        where lppm.lppm_reviewer.proposal_penelitian_id ='.$id);
        $dosen = Review::select('id','name')->get();
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
        ->where('lppm_proposal_penelitian.proposal_penelitian_id', $id)->select('lppm_proposal.proposal_file', 'lppm_proposal.proposal_RAB','lppm_proposal.proposal_reviewer_1_comment','lppm_proposal.proposal_reviewer_2_comment')->orderby('proposal_id','desc')->first();
    
        return view('detailpenLppm',compact('penelitian','propRAB','dokumen',['reviewer'],['anggotaDosen'],['dosen'],['staff'],['mahasiswa']));
    }

    // public function getBidang()
    // {
    //     $bpenelitian = DB::table('bidang_penelitian')->pluck("bidang_penelitian_id","bidang_penelitian_nama");
    //     return view('Penelitian',compact('bpenelitian'));
    // }

    public function index()
    {

        $bidang = bidang_penelitian::select('bidang_penelitian_id','bidang_penelitian_nama')->get();
        $jenispenelitian = jenis_penelitian::select('jenis_penelitian_id','jenis_penelitian_nama')->get();
        // $tujuansosialekonomi = jenis_penelitian::select('jenis_penelitian_id','jenis_penelitian_nama')->get();
        //$luaran = luaran::select('id','nama')->get();
        $tujuan_sosial_ekonomi = tujuan_sosial_ekonomi::select('tujuan_sosial_ekonomi_id','tujuan_sosial_ekonomi_nama')->get();
     

        return view('Penelitian', compact(['bidang', 'jenispenelitian','tujuan_sosial_ekonomi']));
       
    }

    public function insertform()
    {
        return view('stud_create');
    }

    public function insertReviewer(Request $request, $id){
        $Rev1 = new Reviewer();

        $Rev1->dosen_id = $request->input('dosen1');
        $Rev1->proposal_penelitian_id = $id;
        $Rev1->status_id = 1;
        $Rev1->save();

        $Rev2 = new Reviewer();

        $Rev2->dosen_id = $request->input('dosen2');
        $Rev2->proposal_penelitian_id = $id;
        $Rev2->status_id = 1;
        $Rev2->save();
        
        $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $data->status_id = 5;
    
        $data->save();

        $dosen = Pegawai::select('pegawai_id','nama')->get();
        $penelitian = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        
        return redirect('/detailpenlppm/'.$id);;
    }

    public function insert(Request $request)
    {
        
        // $request->validate([
            
        //     'tujuan' => 'required|numeric',
        //     'jumlahmahasiswa' => 'required|numeric'
        //   ]);

        $baseRab  = "../public/uploadRab/";
        $fileRab = $request->file('Rab');
        $pathRab = $fileRab->getClientOriginalName();
        $respRab = $fileRab->move('uploadRab',$pathRab);
       
          //$data->content_url = $base.$path;


          $basePro  = "../public/uploadProposal/";
          $file = $request->file('Proposal');
          $pathPro = $file->getClientOriginalName();
          $respPro = $file->move('uploadProposal',$pathPro);

        $date = date('Y');
        
        $proposal = new proposal_penelitian();

        $proposal->jenis_penelitian_id = $request->input('jenis');
        $proposal->proposal_penelitian_judul = $request->input('judul');
        $proposal->bidang_penelitian_id = $request->input('bidang');
        $proposal->tujuan_sosial_ekonomi_id = $request->input('tujuan');
        // $proposal->proposal_penelitian_dana = $request->input('dana');
        $proposal->proposal_penelitian_ketua = $request->input('ketua');
        $tahun = $request->input('tahun');
        $proposal->proposal_penelitian_tahun = $tahun;
        $proposal->tujuan_sosial_ekonomi_id = $request->input('tujuan');
        $proposal->proposal_penelitian_RAB = $baseRab.$pathRab;
        $proposal->proposal_penelitian_proposal = $basePro.$pathPro;
        if($date > $tahun){
            $proposal->status_id = 8;
        }else{
            $proposal->status_id = 1;
        }
        // $proposal = $request->input('jumlahmahasiswa');
        // $proposal = $request->input('luaran');
        $proposal->save();
        // $data=array('jenis_penelitian'=>$jenis, 'judul'=>$judul, 'bidang_penelitian'=>$bidang, 'tujuan_sosial_ekonomi'=>$tujuan, 'jumlah_dana'=>$dana, 'ketua_peneliti'=>$ketua, 'jumlah_mahasiswa'=>$jumlahmahasiswa, 'luaran'=>$luaran, 'RAB'=>$baseRab.$pathRab, 'proposal'=>$basePro.$pathPro  );
        // DB::table('penelitian')->insert($data);
        echo "Berhasil menambahkan pengajuan.<br/>";
        echo '<a href = "/bpenelitian1">Click Here</a> to go back.';


    }


}


   //$bpenelitian = DB::table('bidang_penelitian')->pluck("id","nama");
        //$selectedID = 2;
       // return $areaList;
    //    $areaList = bidang_penelitian::lists('nama','id');
    //    $area = bidang_penelitian::find(6);


        //return view('Penelitian', compact(['areaList','selectedID']));
        //return view('Penelitian', compact('id','areaList'));
