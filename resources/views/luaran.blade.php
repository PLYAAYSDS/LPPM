@extends('layouts.master')
@section('content')

<head>
<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

</head>
<div class="container" id="proposal" style="padding-top:20px;">
    <div class="col-md-12" style="padding-top:10px;">

        <h2>List luaran penelitian</h2>
        <br>

        <table width=100% style="margin-top:10px">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Luaran</td>
                    <td>Jenis Luaran</td>
                    <td>Aksi</td>
                </tr>

            <tbody>
                @foreach($luaran as $index=>$luaran)
                <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $luaran->luaran_nama }}</td>
                <td>{{ $luaran->luaran_tipe }}</td>
                    @if($luaran->luaran_tipe == "Publikasi di Jurnal")
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
                @endforeach
            </tbody>
            </thead>   
        </table>
             </div>
            </form>
		</div>
	</div>

@endsection