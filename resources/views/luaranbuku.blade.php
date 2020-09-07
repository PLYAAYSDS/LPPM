@extends('layouts.master')
@section('content')
<head>
<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

</head>
<div class="container" id="proposal" style="padding-top:20px;">
    <div class="col-md-12" style="padding-top:10px;">


        <h2>Detail Publikasi Buku</h2>
        <br>
        <table width=100%>
            <tr>
                <td width=200px>Nama Buku</td>
                <td>{{$luaran->luaran_nama}}</td>
            </tr>
            <tr>
                <td width=200px>Tahun Pelaksanaan</td>
                <td>{{$luaran->luaran_tahun}}</td>
            </tr>
            <tr>
                <td width=200px>ISBN</td>
                <td>{{$luaran->luaran_isbn}}</td>
            </tr>
            <tr>
                <td width=200px>Jumlah Halaman</td>
                <td>{{$luaran->luaran_jumlah_halaman}} Halaman</td>
            </tr>
            <tr>
                <td width=200px>Penerbit Buku</td>
                <td>{{$luaran->luaran_penerbit}}</td>
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
    </div>
    

        
</div>

    
@endsection