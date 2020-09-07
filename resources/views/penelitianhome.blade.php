@extends('layouts.master')
@section('content')
    
<div class="container" id="proposal" style="padding-top:20px;">



    <div class="col-md-12" style="padding-top:10px;">
        <div class="tab">
            <button class="tablinks" onclick="openPage(event, 'diajukan')" id="defaultOpen">Pengajuan</button>
            <button class="tablinks" onclick="openPage(event, 'perbaikan')">Butuh Perbaikan</button>
            <button class="tablinks" onclick="openPage(event, 'proses')">Sedang Berjalan</button>
            <button class="tablinks" onclick="openPage(event, 'selesai')">Selesai</button>
            <button class="tablinks" onclick="openPage(event, 'tolak')">Ditolak</button>
        </div>

        <div id="diajukan" class="tabcontent">
            <a href="{{url('/bpenelitian1')}}"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Buat Pengajuan Proposal</button></a>
            <table width=100% style="margin-top:10px">
                <tr>
                    <td width=3%>No</td>
                    <td width=50%>Nama Penelitian</td>
                    <td width=27%>Bidang Penelitian</td>
                    <td width=10%>Status</td>
                    <td width=10%>Aksi</td>
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
                            }else if($status == 9){
                                echo "Diperiksa LPPM";
                            }
                        ?>
                        </td>
                        <td>
                            <center>
                                <?php
                                    $status = $pen->status_id;
                                    if($status == 1){
                                ?>
                                        <a href="{{url('/updateProposal/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <?php
                                    }
                                ?>
                                <a href="{{url('/detailpenelitian/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div id="perbaikan" class="tabcontent">
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
                @foreach($penelitianDiperbaiki as $pen)
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
                            if($status == 12){
                                echo "Butuh Perbaikan";
                            }
                        ?>
                        </td>
                        <td>
                            <center>
                                <a href="{{url('/detailpenelitian/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div id="proses" class="tabcontent">
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
                @foreach($penelitianBerjalan as $pen)
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
                            if($status == 14){
                                echo "Laporan kemajuan diterima pihak LPPM";
                            }else if($status == 15){
                                echo "Laporan kemajuan disetujui";
                            }else if($status == 16){
                                echo "Laporan kemajuan ditolak";
                            }else if($status == 20){
                                echo "Laporan Akhir diterima pihak LPPM";
                            }else if($status == 21){
                                echo "Laporan Akhir sedang direview";
                            }else if($status == 22){
                                echo "Penilaian Laporan Akhir sedang diperiksa LPPM";
                            }else if($status == 24){
                                echo "Harap mengupload ulang laporan akhir";
                            }
                        ?>
                        </td>
                        <td>
                            <center>
                                <a href="{{url('/detailpenelitian/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div id="selesai" class="tabcontent">
            <table width=100%>
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
                @foreach($penelitianSelesai as $pen)
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
                                <a href="{{url('/detailpenelitian/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div id="tolak" class="tabcontent">
            <table width=100%>
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
                @foreach($penelitianDitolak as $pen)
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
                            if($status == 3){
                                echo "ditolak Kaprodi";
                            }else if($status == 11){
                                echo "ditolak LPPM";
                            }
                        ?>
                        </td>
                        <td>
                            <center>
                                <a href="{{url('/detailpenelitian/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>
<script>
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