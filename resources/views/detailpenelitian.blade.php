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
                <td><a href="{{url('uploadProposal/' .$propRAB->proposal_file)}}" target="_blank" download="">{{$propRAB->proposal_file}}</a></td>
                <td>Proposal</td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="{{url('uploadRAB/' .$propRAB->proposal_RAB)}}" target="_blank" download="">{{$propRAB->proposal_RAB}}</a></td>
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
        
        <?php
            if($penelitian->status_id == 10 || $penelitian->status_id == 16){
                ?>
                
                
                <Button type="submit" name="harian" class="btn btn-success" data-toggle="modal" data-target="#harian">Laporan Harian</button>
                <Button type="submit" name="kemajuan" class="btn btn-success" data-toggle="modal" data-target="#kemajuan">Laporan kemajuan</button>
                <Button type="submit" name="akhir" class="btn btn-success" data-toggle="modal" data-target="#akhir">Laporan akhir</button>
                
                <?php
            }else if($penelitian->status_id == 14 || $penelitian->status_id == 15){
                ?>
                
                
                <Button type="submit" name="harian" class="btn btn-success" data-toggle="modal" data-target="#harian">Laporan Harian</button>
                <Button type="submit" name="akhir" class="btn btn-success" data-toggle="modal" data-target="#akhir">Laporan akhir</button>
                
                <?php
            }else if($penelitian->status_id == 12){
                ?>
                <Button type="submit" name="perbaikans" class="btn btn-success" data-toggle="modal" data-target="#komentar">Lihat Komentar Perbaikan</button>
                <Button type="submit" name="perbaikans" class="btn btn-success" data-toggle="modal" data-target="#perbaikan">Upload Perbaikan Dokumen</button>
                <?php
            }
            ?>
        <br>
    </div>
    

        
</div>

    <div id="harian" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <form enctype="multipart/form-data" action ="/Harian/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                <div class="modal-content">
                    
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Laporan Harian</h4>
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
                        <input type="submit" name="submit" class="btn btn-primary input-lg" value="Upload Dokumen" />
                    </div>
                </div>
            </form>
		</div>
	</div>

    <div id="perbaikan" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <form enctype="multipart/form-data" action ="/perbaikan/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                <div class="modal-content">
                    
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Perbaikan Dokumen</h4>
                    </div>
                    
                    <div class="modal-body">
                        <div>
                            <div>
                                <label style="width: 172px">Rab: </label>
                                <div style="width: 1000px">
                                    <input type="file" name="Rab" value=" "/>
                                </div>
                            </div>
                            <div>
                                <label style="width: 172px">Proposal: </label>
                                <div style="width: 1000px">
                                    <input type="file" name="Proposal" value=" "/>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-primary input-lg" value="Upload Dokumen" />
                    </div>
                </div>
            </form>
		</div>
	</div>

    <div id="komentar" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <div class="modal-content">
                
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Komentar Reviewer</h4>
                </div>
                
                <div class="modal-body">
                    <div>
                        <div>
                            <?php
                                if($propRAB->proposal_reviewer_1_perbaikan == 1){
                            ?>
                                    <label style="width: 172px">Komentar Reviewer 1 </label>
                                    <div style="width: 1000px">
                                        {{$propRAB->proposal_reviewer_1_comment}}
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div>
                            <?php
                                if($propRAB->proposal_reviewer_2_perbaikan == 1){
                            ?>
                                    <label style="width: 172px">Komentar Reviewer 2 </label>
                                    <div style="width: 1000px">
                                        {{$propRAB->proposal_reviewer_2_comment}}
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary input-lg" value="Upload Dokumen" />
                </div>
            </div>
		</div>
	</div>

    <div id="kemajuan" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <form enctype="multipart/form-data" action="/Kemajuan/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                <div class="modal-content">
                    
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Laporan Kemajuan</h4>
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
                        <input type="submit" name="submit" class="btn btn-primary input-lg" value="Upload Dokumen" />
                    </div>
                </div>
            </form>
		</div>
	</div>

    <div id="akhir" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <form enctype="multipart/form-data" action ="/Final/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Laporan Akhir</h4>
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
                        <input type="submit" name="submit" class="btn btn-primary input-lg" value="Upload Dokumen" />
                    </div>
                </div>
            </form>
		</div>
	</div>
    <script>
        var angka = "<?php $penelitian->status_id ?>"
        
        if (angka == 14 || angka == 15){
            document.getElementById("kemajuan").disabled = true;
        }
    </script>
@endsection