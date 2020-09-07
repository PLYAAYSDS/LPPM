@extends('layouts.master')
@section('content')
<head>
<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

</head>
<div class="container" id="proposal" style="padding-top:20px;">
    <div class="col-md-12" style="padding-top:10px;">

            <h2>Detail Penelitian</h2>
        <br>
        <table width=100%>
            <tr>
                <td width=200px>Judul Penelitian</td>
                <td>{{$penelitian->proposal_penelitian_judul}}</td>
            </tr>
            <tr>
                <td width=200px>Tahun Penelitian</td>
                <td>{{$penelitian->proposal_penelitian_tahun_dilaksanakan}}</td>
            </tr>
            <tr>
                <td width=200px>Ketua Penelitian</td>
                <td>{{$penelitian->proposal_penelitian_ketua}}</td>
            </tr>
            <tr>
                <td width=200px>Dana Penelitian</td>
                <td>{{$penelitian->proposal_penelitian_jumlah_dana}}</td>
            </tr>
            <!-- <tr>
                <td width=200px>Proposal</td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td width=200px>RAB</td>
                <td>
                    
                </td>
            </tr> -->
            <tr>
                <td width=200px>Status</td>
                <td>
                    <?php
                        $status = $penelitian->status_id;
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
                            echo "Penelitian Selesai";
                        }
                    ?>
                </td>
            </tr>
        </table>

        <table width=100% style="margin-top:10px">
            <tr>
                <td colspan="3" style="background-color:#000;">
                    <h6 style="color:#fff"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Anggota Dosen</h6>
                </td>
            </tr>
            <tr>
                <td width=5%>No.</td>
                <td>Nama</td>
            </tr>
                    <?php
                        $i=1;
                    ?>
                    @foreach($anggotaDosen as $agt)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$agt->nama}}</td>
                    </tr>
                    <?php 
                        $i++;
                    ?>
                    @endforeach
        </table>

        <table width=100% style="margin-top:10px">
            <tr>
                <td colspan="3" style="background-color:#000;">
                    <h6 style="color:#fff"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Anggota Staf Pengajar</h6>
                </td>
            </tr>
            <tr>
                <td width=5%>No.</td>
                <td>Nama</td>
            </tr>   
                    <?php
                        $i=1;
                    ?>
                    @foreach($staff as $agt)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$agt->nama}}</td>
                    </tr>
                    <?php 
                        $i++;
                    ?>
                    @endforeach
        </table>

        <table width=100% style="margin-top:10px">
            <tr>
                <td colspan="3" style="background-color:#000;">
                    <h6 style="color:#fff"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Anggota Mahasiswa</h6>
                </td>
            </tr>
            <tr>
                <td width=5%>No.</td>
                <td>Nama</td>
            </tr>   
                <?php
                    $i=1;
                ?>
                @foreach($mahasiswa as $agt)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$agt->nama}}</td>
                </tr>
                <?php 
                    $i++;
                ?>
                @endforeach
        </table>

        
            <table width=100% style="margin-top:10px">
                <tr>
                    <td colspan="3" style="background-color:#000;">
                        <h6 style="color:#fff"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Dokumen</h6>
                    </td>
                </tr>
                <tr>
                    <td width=5%>No.</td>
                    <td>Nama Dokumen</td>
                    <td>Jenis Dokumen</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><a href="{{url('uploadProposal/' .$propRAB->proposal_file)}}" target="_blank">{{$propRAB->proposal_file}}</a></td>
                    <td>Proposal</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href="{{url('uploadRAB/' .$propRAB->proposal_RAB)}}">{{$propRAB->proposal_RAB}}</a></td>
                    <td>RAB</td>
                </tr>
            </table>
            <br>
            <?php
            if($penelitian->status_id == 2){
                ?>
                <form enctype="multipart/form-data" action = "/persetujuanKaprodi/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                    <Button type="submit" name="status" class="btn btn-success" value="DiterimaDekan" >Lanjutkan ke LPPM</button>
                </form>
                <?php
            }?>
        </div>
    </div>

@endsection