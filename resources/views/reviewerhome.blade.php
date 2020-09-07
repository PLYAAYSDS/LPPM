@extends('layouts.master')
@section('content')

<div class="container" style="padding-top:20px;">

    <div class="col-md-12" style="padding-top:10px;">
        <table width=100% id="proposal">
            <tr>
                <td width=3%>No</td>
                <td width=50%>Judul Penelitian</td>
                <td width=20%>Bidang Penelitian</td>
                <td width=22%>Ketua Penelitian</td>
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
                    <td>{{$pen->proposal_penelitian_ketua}}</td>
                    <td>
                        <center>
                            <a href="{{url('/kuesioner/'.$pen->proposal_penelitian_id)}}"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
                        </center>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection