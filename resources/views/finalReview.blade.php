@extends('layouts.master')
@section('content')
<head>
<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        

    </style>
</head>
<body>
                
    <div class="container" id="proposal" >


            <h3>Proposal Penelitian</h3>
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
            <?php
                if($penelitian->status_id == 10 || $penelitian->status_id > 13){
                $i=3;
            ?>
                @foreach($dokumen as $dok)
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                        <?php
                        if($dok->dokumen_tipe == "Laporan Harian"){
                        ?>
                                <a href="{{url('uploadHarian/' .$dok->dokumen_proposal_penelitian)}}">{{$dok->dokumen_proposal_penelitian}}</a>
                        <?php   
                            }else if($dok->dokumen_tipe == "Laporan Kemajuan"){
                        ?>
                                <a href="{{url('uploadKemajuan/' .$dok->dokumen_proposal_penelitian)}}">{{$dok->dokumen_proposal_penelitian}}</a>
                        <?php
                            }else if($dok->dokumen_tipe == "Laporan Akhir"){
                        ?>
                                <a href="{{url('uploadAkhir/' .$dok->dokumen_proposal_penelitian)}}">{{$dok->dokumen_proposal_penelitian}}</a>
                        <?php
                            }else if($dok->dokumen_tipe == "Kontrak"){
                        ?>
                                <a href="{{url('uploadKontrak/' .$dok->dokumen_proposal_penelitian)}}">{{$dok->dokumen_proposal_penelitian}}</a>
                        <?php
                            }else if($dok->dokumen_tipe == "SK"){
                        ?>
                                <a href="{{url('uploadSK/' .$dok->dokumen_proposal_penelitian)}}">{{$dok->dokumen_proposal_penelitian}}</a>
                        <?php
                            }
                        ?>
                        </td>
                        <td>{{$dok->dokumen_tipe}}</td>
                    </tr>
                    <?php 
                        $i++;
                    ?>
                @endforeach
            <?php
                }
            ?>
        </table>
        <Button type="penilaian" name="harian" class="btn btn-success" data-toggle="modal" data-target="#penilaian">Upload Penilaian</button>
    </div>

    <div id="penilaian" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <form enctype="multipart/form-data" action ="/penilaianLaporanAkhir/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                <div class="modal-content">
                    
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Penilaian Laporan Akhir</h4>
                    </div>
                    
                    <div class="modal-body">
                    <div>
                            <td>
                            <div style="width: 1000px">
                                <input type="file" name="dokumen" value=" "required="required"  />
                            </div>
                            </td>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-primary input-lg" value="Upload Penilaian" />
                    </div>
                </div>
            </form>
		</div>
	</div>



    </body>
@endsection