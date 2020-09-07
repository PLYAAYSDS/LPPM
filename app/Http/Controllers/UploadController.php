<?php

namespace App\Http\Controllers;
use DB;
use App\dokumen_proposal;
use App\lppm_proposal;
use App\Reviewer;
use App\proposal_penelitian;
use App\penilaian_laporan_akhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class UploadController extends Controller
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

    public function dailyReport(Request $request, $id)
    {
        $baseDaily  = "../public/uploadHarian/";
        $fileDaily = $request->file('dokumen');
        $pathDaily = $fileDaily->getClientOriginalName();
        $respDaily = $fileDaily->move('uploadDaily',$pathDaily);
             
        $dokumen = new dokumen_proposal();

        $dokumen->proposal_penelitian_id = $id;
        $dokumen->dokumen_proposal_penelitian = $pathDaily;
        $dokumen->dokumen_tipe = 'Laporan Harian';
        $dokumen->save();
        return redirect('/detailpenelitian/'.$id);
    }

    public function Progress(Request $request, $id)
    {
        $baseKemajuan  = "../public/uploadKemajuan/";
        $fileKemajuan = $request->file('dokumen');
        $pathKemajuan = $fileKemajuan->getClientOriginalName();
        $respKemajuan = $fileKemajuan->move('uploadKemajuan',$pathKemajuan);
             
        $dokumen = new dokumen_proposal();

        $dokumen->proposal_penelitian_id = $id;
        $dokumen->dokumen_proposal_penelitian = $pathKemajuan;
        $dokumen->dokumen_tipe = 'Laporan Kemajuan';
        $dokumen->save();

        $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $data->status_id = 14;

        $data->save();
        return redirect('/detailpenelitian/'.$id);
    }
    
    public function finalReport(Request $request, $id)
    {
        $baseFinal  = "../public/uploadAkhir/";
        $fileFinal = $request->file('dokumen');
        $pathFinal = $fileFinal->getClientOriginalName();
        $respFinal = $fileFinal->move('uploadAkhir',$pathFinal);
        
        $dokumen = new dokumen_proposal();

        $dokumen->proposal_penelitian_id = $id;
        $dokumen->dokumen_proposal_penelitian = $pathFinal;
        $dokumen->dokumen_tipe = 'Laporan Akhir';
        $dokumen->save();

        $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $data->status_id = 20;

        $data->save();

        return redirect('/detailpenelitian/'.$id);
    }

    public function penilaianLaporan(Request $request, $id)
    {
        $baseFinal  = "../public/uploadPenilaianAkhir/";
        $fileFinal = $request->file('dokumen');
        $pathFinal = $fileFinal->getClientOriginalName();
        $respFinal = $fileFinal->move('uploadPenilaianAkhir',$pathFinal);

        $dosen = auth()->user()->id;
        $reviewer = Reviewer::select('reviewer_id')->Where('dosen_id', $dosen)->Where('proposal_penelitian_id', $id)->first();
             
        $dokumen = new penilaian_laporan_akhir();

        // $dokumen->reviewer = $id;
        $dokumen->reviewer_id = $reviewer->reviewer_id;
        $dokumen->penilaian_laporan_akhir_file = $pathFinal;
        $dokumen->save();

        $reviewer->status_id = 6;
        $reviewer->save();

        $proposalReviewer = Reviewer::select("reviewer_id","status_id")->where("proposal_penelitian_id", $id)->get();
        $sudah = 0;
        $belum = 0;

        foreach($proposalReviewer AS $prop){
            if($prop->status_id == 5){
                $belum += 1;
            }else if($prop->status_id == 6){
                $sudah += 1;
            }
        }

        if($sudah == 2){
            $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
            $data->status_id = 22;
                
            $data->save();
        }

        return redirect('/detailpenelitian/'.$id);
    }

    public function perbaikan(Request $request, $id)
    {
        $baseRab  = "../public/uploadRab/";
        $fileRab = $request->file('Rab');
        $pathRab = $fileRab->getClientOriginalName();
        $respRab = $fileRab->move('uploadRab',$pathRab);
       
          //$data->content_url = $base.$path;


        $basePro  = "../public/uploadProposal/";
        $file = $request->file('Proposal');
        $pathPro = $file->getClientOriginalName();
        $respPro = $file->move('uploadProposal',$pathPro);
             
        $dokumen = new lppm_proposal();
        $dokumen->proposal_penelitian_id = $id;
        $dokumen->proposal_file = $pathPro;
        $dokumen->proposal_RAB = $pathRab;
        $dokumen->save();

        $data = proposal_penelitian::where('proposal_penelitian_id', $id)->first();
        $data->status_id = 5;

        $data->save();

        $reviewer = Reviewer::select('reviewer_id')->Where('status_id', 4)->Where('proposal_penelitian_id', $id)->first();

        $reviewer->status_id = 8;
        $reviewer->save();
        
        return redirect('/detailpenelitian/'.$id);
    }
}

