@extends('layouts.master')
@section('content')
    
<div class="container" id="proposal" style="padding-top:20px;">
    <div class="col-md-12" style="padding-top:10px;">
        <div class="tab">
            <button class="tablinks" onclick="openPage(event, 'diajukan')" id="defaultOpen">Pengajuan proposal</button>
            <button class="tablinks" onclick="openPage(event, 'dokumentasi')">Pengajuan dokumentasi</button>
            <button class="tablinks" onclick="openPage(event, 'luaran')">Pengajuan luaran</button>
            <button class="tablinks" onclick="openPage(event, 'review')">Selesai di review</button>
            <button class="tablinks" onclick="openPage(event, 'proses')">Sedang Berjalan</button>
            <button class="tablinks" onclick="openPage(event, 'selesai')">Selesai</button>
        </div>
        <div id="diajukan" class="tabcontent">
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
                                <a href="{{url('/detailpenlppm/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
               
        <div id="dokumentasi" class="tabcontent">
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
                @foreach($documentation as $pen)
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
                                <a href="{{url('/detailpenlppm/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div id="luaran" class="tabcontent">
            <table width=100%>
                <tr>
                    <td width=3%>No</td>
                    <td>Nama Luaran</td>
                    <td>Jenis Luaran</td>
                    <td width=15%>Status</td>
                    <td width=5%>Aksi</td>
                </tr>
                <?php
                    $i = 0;
                ?>
                @foreach($luaran as $luaran)
                    <?php
                        $i++;
                    ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $luaran->luaran_nama }}</td>
                        <td>{{ $luaran->luaran_tipe }}</td>
                        <td>
                        <?php
                            $status = $luaran->status_id;
                            if($status == 17){
                                echo "Request Luaran";
                            }
                        ?>
                        </td>@if($luaran->luaran_tipe == "Publikasi di Jurnal")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranjurnal/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Publikasi di media massa")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranmediamassa/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Pemakalah di forum ilmiah")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranforumilmiah/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Hak kekayaan internasional")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranhakkekayaaninternasional/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Luaran iptek")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaraniptek/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Produk terstandarisasi")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranprodukterstandarisasi/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Produk tersertifikasi")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranproduktersertifikasi/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Mitra hukum")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranmitrahukum/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @elseif($luaran->luaran_tipe == "Buku")
                    <td> 
                        <div class="dropdown">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Tools
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right">
                            <li><a class="fa fa-eye" href="/luaranbuku/{{$luaran->luaran_id}}"> Detail</a></li>
                        </div>
                    </td>
                    @endif
                    </tr>
                @endforeach
            </table>
        </div>

        <div id="review" class="tabcontent">
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
                @foreach($reviewdone as $pen)
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
                                <a href="{{url('/detailpenelitianlppm/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        
        <div id="proses" class="tabcontent">
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
                @foreach($onProgress as $pen)
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
                                echo "Laporan kemajuan telah diupload";
                            }else if($status == 15){
                                echo "Laporan kemajuan disetujui";
                            }else if($status == 16){
                                echo "Laporan kemajuan ditolak";
                            }else if($status == 20){
                                echo "Laporan Akhir telah diupload";
                            }else if($status == 21){
                                echo "Laporan Akhir sedang direview";
                            }else if($status == 22){
                                echo "Penilaian Laporan Akhir sudah selesai";
                            }else if($status == 24){
                                echo "Harap mengupload ulang laporan akhir";
                            }
                        ?>
                        </td>
                        <td>
                            <center>
                                <a href="{{url('/detailpenelitianlppm/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
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
                @foreach($researchDone as $pen)
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
                                <a href="{{url('/detailpenelitianlppm/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
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