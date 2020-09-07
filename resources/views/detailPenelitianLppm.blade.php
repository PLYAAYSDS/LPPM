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
                <td>{{$penelitian->proposal_penelitian_tahun}}</td>
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
            <br>
            <?php
            if($penelitian->status_id == 4){
                ?>
                
                <Button type="submit" name="status" class="btn btn-success" data-toggle="modal" data-target="#myModal">Pilih Reviewer</button>
                
                <?php
            }else if($penelitian->status_id == 9){
                ?>
                <Button type="submit" name="status" class="btn btn-success" data-toggle="modal" data-target="#penilaian">Lihat Penilaian</button>
                <Button type="submit" name="status" class="btn btn-success" data-toggle="modal" data-target="#upload">Diterima</button>
                <form enctype="multipart/form-data" action = "/persetujuanKaprodi/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                    <Button type="submit" name="status" class="btn btn-danger" value="ProposalDitolak" >Ditolak</button>
                </form>
                <?php
            }else if($penelitian->status_id == 5){
                ?>
                
                Penelitian sedang dalam proses review
                <br><br><br>
                Daftar Reviewer : 
                <br><br>
                <table>
                    <tr><td width=200px>Nama</td<td>Status</td?</tr>
                @foreach($reviewer as $bidang)
                    <tr>
                        <td>
                            {{$bidang->nama}}
                        </td>
                        <td>
                            <?php

                                if($bidang->status_id == 1){
                                    echo "belum direview";
                                }else if($bidang->status_id == 2){
                                    echo "diterima";
                                }else{
                                    echo "ditolak";
                                }

                            ?>
                        </td>
                    </tr>
                @endforeach
                </table>
                <?php
            }?>
            <?php
                if($penelitian->status_id == 14){
            ?>
                <form enctype="multipart/form-data" action = "/periksaDokumen/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                    <Button type="submit" name="status" class="btn btn-success" value="Diterima" >Diterima</button>
                    <Button type="submit" name="status" class="btn btn-danger" value="Ditolak" >Ditolak</button>
                </form>        
            <?php
                }if($penelitian->status_id == 20){
                    ?>
                        <form enctype="multipart/form-data" action = "/periksaDokumen/{{$penelitian->proposal_penelitian_id}}" method = "post">
                            @csrf
                            <Button type="submit" name="status" class="btn btn-success" value="lanjutKeReviewer" >Teruskan ke Reviewer</button>
                        </form>        
                    <?php
                }
            ?>
                   
                   <?php
                if($penelitian->status_id == 22){
                    ?>
                        <Button type="submit" name="status" class="btn btn-success" data-toggle="modal" data-target="#penilaianAkhir">Lihat Penilaian</button>
                        <form enctype="multipart/form-data" action = "/periksaDokumen/{{$penelitian->proposal_penelitian_id}}" method = "post">
                        @csrf
                            <Button type="submit" name="status" class="btn btn-success" value="laporanAkhirDiterima">Diterima</button>
                            <Button type="submit" name="status" class="btn btn-danger" value="laporanAkhirDitolak" >Ditolak</button>
                        </form>    
                    <?php
                }
            ?>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <form enctype="multipart/form-data" action = "/tambahreviewer/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                <div class="modal-content">
                    
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pilih Reviewer {{$penelitian->proposal_penelitian_judul}}</h4>
                    </div>
                    
                    <div class="modal-body">
                        <span>Reviewer 1 </span>
                        <div>
                            <select name="dosen1" style="width: 500px" id="dosen1">
                                <option></option>
                                @foreach($dosen as $bidang)
                                <option value="{{$bidang->id}}" >{{$bidang->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span>Reviewer 2 </span>
                        <div>
                            <select name="dosen2" style="width: 500px" id="dosen2">
                                <option></option>
                                @foreach($dosen as $bidang)
                                <option value="{{$bidang->id}}" >{{$bidang->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-primary input-lg" value="Buat Pengajuan" />
                    </div>
                </div>
            </form>
		</div>
	</div>

    <div id="penilaian" class="modal fade" role="dialog">
        <div class="col-md-12" id="proposal" style="padding-top:10px;">
            <div class="modal-dialog" style="width:80%">
                    <div class="modal-content">
                        
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Hasil Penilaian Proposal</h4>
                        </div>
                        
                        <div class="modal-body">
                            <div class="tab">
                                <button class="tablinks" onclick="openPage(event, 'satu')" id="defaultOpen">Reviewer 1</button>
                                <button class="tablinks" onclick="openPage(event, 'dua')">Reviewer 2</button>
                            </div>
                            <div id="satu" class="tabcontent">

                                <table width=100%>
                                    <tr>   
                                        <td width=15%>Nama Reviewer</td>
                                        <td width=85%>{{$firstName}}</td>
                                    </tr>
                                    <tr>   
                                        <td width=15%>Status Reviewer</td>
                                        <td width=85%>
                                            <?php
                                                if($firstReviewer->status_id == 2){
                                                    echo "Menyetujui Proposal";
                                                }else if($firstReviewer->status_id == 3){
                                                    echo "Menolak Proposal";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=15%>Komentar Reviewer</td>
                                        <td width=85%>{{$firstReviewer->reviewer_komentar}}</td>
                                    </tr>
                                </table>

                                <Table style="margin-top:20px">
                                    <tr>
                                        <td width=5%>No.</td>
                                        <td width=55%>Pertanyaan</td>
                                        <td width=10%>Persentase</td>
                                        <td width=10%>Skor</td>
                                        <td width=20%>Total Skor</td>
                                    </tr>
                                    <?php
                                        $i = 1;
                                        $nilai = 0;
                                    ?>
                                    @foreach($hasilPertama as $hasil)
                                        <tr>
                                            <td>
                                                {{$i}}
                                            </td>
                                            <td>
                                                {{$hasil->kuesioner_kuesioner}}
                                            </td>
                                            <td>
                                                {{$hasil->kuesioner_persentase}}
                                            </td>
                                            <td>
                                                {{$hasil->persentase}}
                                            </td>
                                            <td>
                                                <?php

                                                    $hasil = $hasil->kuesioner_persentase * $hasil->persentase;
                                                    echo $hasil;

                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                            $i++;
                                            $nilai+=$hasil;
                                        ?>
                                    @endforeach
                                        <tr>
                                            <td colspan=4></td>
                                            <td>{{$nilai}}</td>
                                        </tr>
                                </Table>

                            </div>
                            <div id="dua" class="tabcontent">

                                <table width=100%>
                                    <tr>   
                                        <td width=15%>Nama Reviewer</td>
                                        <td width=85%>{{$secondName}}</td>
                                    </tr>
                                    <tr>   
                                        <td width=15%>Status Reviewer</td>
                                        <td width=85%>
                                            <?php
                                                if($secondReviewer->status_id == 2){
                                                    echo "Menyetujui Proposal";
                                                }else if($secondReviewer->status_id == 3){
                                                    echo "Menolak Proposal";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=15%>Komentar Reviewer</td>
                                        <td width=85%>{{$secondReviewer->reviewer_komentar}}</td>
                                    </tr>
                                </table>

                                <Table style="margin-top:20px">
                                    <tr>
                                        <td width=5%>No.</td>
                                        <td width=55%>Pertanyaan</td>
                                        <td width=10%>Persentase</td>
                                        <td width=10%>Skor</td>
                                        <td width=20%>Total Skor</td>
                                    </tr>
                                    <?php
                                        $i = 1;
                                        $nilai = 0;
                                    ?>
                                    @foreach($hasilKedua as $hasil)
                                        <tr>
                                            <td>
                                                {{$i}}
                                            </td>
                                            <td>
                                                {{$hasil->kuesioner_kuesioner}}
                                            </td>
                                            <td>
                                                {{$hasil->kuesioner_persentase}}
                                            </td>
                                            <td>
                                                {{$hasil->persentase}}
                                            </td>
                                            <td>
                                                <?php

                                                    $hasil = $hasil->kuesioner_persentase * $hasil->persentase;
                                                    echo $hasil;

                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                            $i++;
                                            $nilai+=$hasil;
                                        ?>
                                    @endforeach
                                        <tr>
                                            <td colspan=4></td>
                                            <td>{{$nilai}}</td>
                                        </tr>
                                </Table>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                        
                        </div>
                    </div>
            </div>
        </div>
	</div>

    <div id="penilaianAkhir" class="modal fade" role="dialog">
        <div class="col-md-12" id="proposal" style="padding-top:10px;">
            <div class="modal-dialog" >
                    <div class="modal-content">
                        
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Hasil Penilaian Laporan Akhir</h4>
                        </div>
                        
                        <div class="modal-body">

                            <h4>Reviewer 1</h4>
                            <table width=100%>
                                <tr>
                                    <td width=20%>Nama</td>
                                    <td>{{$firstName}}</td>
                                </tr>
                                <tr>
                                    <td width=20%>Hasil Penilaian</td>
                                    <td><a href="{{url('uploadPenilaianAkhir/' .$filePertama)}}">{{$filePertama}}</a></td>
                                </tr>
                            </table>
                            <h4>Reviewer 2</h4>
                            <table width=100%>
                                <tr>
                                    <td width=20%>Nama</td>
                                    <td>{{$secondName}}</td>
                                </tr>
                                <tr>
                                    <td width=20%>Hasil Penilaian</td>
                                    <td><a href="{{url('uploadPenilaianAkhir/' .$fileKedua)}}">{{$fileKedua}}</a></td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="modal-footer">
                        
                        </div>
                    </div>
            </div>
        </div>
	</div>

    <div id="upload" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <form enctype="multipart/form-data" action = "/beriSK/{{$penelitian->proposal_penelitian_id}}" method = "post">
                @csrf
                <div class="modal-content">
                    
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lampirkan Kontrak</h4>
                    </div>
                    
                    <div class="modal-body">
                        <div>
                            <td><label style="width: 172px">Kontrak: </label></td>
                            <td>
                            <div style="width: 1000px">
                                <input type="file" name="dokumen" value=" "required="required"  />
                            </div>
                            </td>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <Button type="submit" name="status" class="btn btn-primary input-lg" value="ProposalDiterima">Upload Kontrak</Button>
                    </div>
                </div>
            </form>
		</div>
	</div>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script >
    $("#dosen1").select2({
        placeholder: 'Pilih Nama Dosen',
        allowClear: true
    });
    $("#dosen2").select2({
        placeholder: 'Pilih Nama Dosen',
        allowClear: true
    });
    function openPage(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();

    </script>
@endsection