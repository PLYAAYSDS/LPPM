@extends('layouts.master')
@section('content')
    
<div class="container" id="proposal" style="padding-top:20px;">
    <div class="col-md-12" style="padding-top:10px;">
        
        <a href="{{url('/bpenelitian1')}}"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat Pengajuan Proposal</button></a>
        <br>
        <table width=100% style="margin-top:10px">
            <tr>
                <td width=3%>No</td>
                <td width=50%>Nama Penelitian</td>
                <td width=27%>Bidang Penelitian</td>
                <td width=15%>Status</td>
                <td width=5%>Aksi</td>
            </tr>
            <?php
                $i = 0;
            ?>
            @foreach($penelitian as $pen)
                <?php
                    $i++;
                ?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$pen->proposal_penelitian_judul}}</td>
                    <td>{{$pen->bidang_penelitian_nama}}</td>
                    <td>
                    <?php
                        $status = $pen->status_id;
                        if($status == 1){
                            echo "diajukan";
                        }else if($status == 2){
                            echo "diterima Kaprodi";
                        }else if($status == 3){
                            echo "ditolak Kaprodi";
                        }else if($status == 4){
                            echo "diterima Dekan";
                        }else if($status == 5){
                            echo "sedang Direview";
                        }else if($status == 6){
                            echo "Proposal Disetujui";
                        }else if($status == 7){
                            echo "Proposal Ditolak";
                        }else if($status == 8){
                            echo "Selesai";
                        }
                    ?>
                    </td>
                    <td>
                        <center>
                            <a href="{{url('/detailpenelitiankaprodi/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        </center>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection