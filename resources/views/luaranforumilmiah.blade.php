@extends('layouts.master')
@section('content')
<head>
<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

</head>
<div class="container" id="proposal" style="padding-top:20px;">
    <div class="col-md-12" style="padding-top:10px;">


        <h2>Detail Publikasi Forum Ilmiah</h2>
        <br>
        <table width=100%>
            <tr>
                <td width=200px>Nama Makalah</td>
                <td>{{$luaran->luaran_nama}}</td>
            </tr>
            <tr>
                <td width=200px>Tahun Penerbitan</td>
                <td>{{$luaran->luaran_tahun}}</td>
            </tr>
            <tr>
                <td width=200px>Jenis Forum Makalah</td>
                <td>{{$luaran->luaran_tingkat_forum_ilmiah}}</td>
            </tr>
            <tr>
                <td width=200px>Institusi Penyelenggara</td>
                <td>{{$luaran->luaran_institusi_penyelenggara}}</td>
            </tr>
            <tr>
                <td width=200px>Tempat Pelaksanaan</td>
                <td>{{$luaran->luaran_tempat_pelaksanaan}}</td>
            </tr>
            <tr>
                <td width=200px>ISBN</td>
                <td>{{$luaran->luaran_isbn}}</td>
            </tr>
        </table>

        <table width=100% style="margin-top:10px">
            <tr>
                <td colspan="3" style="background-color:#000;">
                    <h6 style="color:#fff"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Anggota Dosen</h6>
                </td>
            <tr>
                <td width=5%>No.</td>
                <td>Nama</td>
                @foreach($anggotaDosen as $index=>$dosen)
                <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $dosen->nama }}</td>
                </tr>
                @endforeach
            </tr>   
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
                @foreach($staff as $index=>$staff)
                <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $staff->nama }}</td>
                </tr>
                @endforeach
            </tr>   
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
                @foreach($mahasiswa as $index=>$mahasiswa)
                <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                </tr>
                @endforeach
            </tr>   
        </table>

        <table width=100% style="margin-top:10px">
            <tr>
                <td colspan="3" style="background-color:#000;">
                    <h6 style="color:#fff"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Dokumen</h6>
                </td>
            </tr>
            <tr>
                <td>Nama Dokumen</td>
            </tr>
            <tr>
                <td><a href=" {{url('uploadLuaran/' .$luaran->luaran_file)}}">{{$luaran->luaran_file}}</a></td>
            </tr>

        </table>
        
        <br>
            <?php
                $user = auth()->user()->role;
            ?>
            @if($luaran->status_id == 17 && $user  == 1)
            <td><a href="{{ url('/terima/'.$luaran->luaran_id) }}" class="btn btn-success">Terima</a></td>
            <td><a href="{{ url('/tolak/'.$luaran->luaran_id) }}" class="btn btn-danger">Tolak</a></td>
            @endif        
        <br>
        <br>
    </div>
    

        
</div>

    
@endsection