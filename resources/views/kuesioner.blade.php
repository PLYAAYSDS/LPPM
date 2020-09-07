@extends('layouts.master')
@section('content')
<head>
<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        

    </style>
</head>
<body>
                
<form enctype="multipart/form-data" action = "/jawab/{{$penelitian->proposal_penelitian_id}}" method = "post">
    @csrf
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
        </table>

        <div class="col-md-12">
            <h3>Form Penilaian Proposal</h3>
            <hr>

            <table>
            <?php
                $j=0;
            ?>

                @foreach($kuesioners as $kuesion)
                    <tr>
                    <?php 
                        $j++;
                        echo "<td width=2%>".$j."</td>";
                    ?>

                    <td width=65%>
                        {{$kuesion->kuesioner_kuesioner}}
                    </td>    
                    <td width=30%>
                        <input type="radio" id="1" name="kuesion_id[<?php echo $kuesion->kuesioner_id?>]" value="<?php echo $kuesion->kuesioner_id?>#1">
                        <label for="1">1</label>
                        <input type="radio" id="2" name="kuesion_id[<?php echo $kuesion->kuesioner_id?>]" value="<?php echo $kuesion->kuesioner_id?>#2">
                        <label for="2">2</label>
                        <input type="radio" id="3" name="kuesion_id[<?php echo $kuesion->kuesioner_id?>]" value="<?php echo $kuesion->kuesioner_id?>#3">
                        <label for="3">3</label>
                        <input type="radio" id="5" name="kuesion_id[<?php echo $kuesion->kuesioner_id?>]" value="<?php echo $kuesion->kuesioner_id?>#5">
                        <label for="5">5</label>
                        <input type="radio" id="6" name="kuesion_id[<?php echo $kuesion->kuesioner_id?>]" value="<?php echo $kuesion->kuesioner_id?>#6">
                        <label for="6">6</label>
                        <input type="radio" id="7" name="kuesion_id[<?php echo $kuesion->kuesioner_id?>]" value="<?php echo $kuesion->kuesioner_id?>#7">
                        <label for="7">7</label>
                    </td>
                    </tr>
                    <tr height=20px>
                    <input type="hidden" name="kuesioner[{{$kuesion->kuesioner_id}}]" value={{$kuesion->kuesioner_id}}>
                    </tr>
                @endforeach

            </table>

            Komentar terhadap proposal<br>
            <textarea name="alasan" rows="4" cols=100%></textarea><br><br>

            <!-- alasan (apabila ditolak)<br>
            <textarea name="alasan" rows="4" cols=100%></textarea><br><br>

            saran perbaikan (apabila ada)<br>
            <textarea name="alasan" rows="4" cols=100%></textarea> -->

            <hr>
            <div class="form-group text-center">
                <Button type="submit" name="status" class="btn btn-success" value="Diterima" >Diterima</button>
                <?php
                    if($totalPerbaikan < 3){
                ?>
                    <Button type="submit" name="status" class="btn btn-warning" value="Perbaikan">Perbaikan</button>
                <?php
                    }
                ?>
                <Button type="submit" name="status" class="btn btn-danger" value="Ditolak">Ditolak</button>
            </div>
        </div>
        
    
     

    </div>
    </form>



    </body>
@endsection