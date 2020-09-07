@extends('layouts.master')
@section('content')
    
<div class="container" style="padding-top:20px;">

    <Button type="submit" name="pertanyaan" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah pertanyaan baru</button>
    <div class="col-md-12" style="padding-top:10px;">
    <table width=100% id="proposal">
            <tr>
                <td width=3%>No</td>
                <td width=80%>Pertanyaan</td>
                <td width=17%>persentase</td>
            </tr>
            <?php
                $i = 0;
            ?>
            @foreach($kuesioner as $pen)
                <?php
                    $i++;
                ?>
                <tr>
                    <td>{{$i}}</td>
                    <td><a href="{{url('/kuesioner/'.$pen->kuesioner_id)}}">{{$pen->kuesioner_kuesioner}}</a></td>
                    <td>{{$pen->kuesioner_persentase}}</td>
                    <!-- <td>{{$pen->status_id}}</td> -->
                </tr>
            @endforeach

            <!-- {{$persentase}} -->
        </table>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form enctype="multipart/form-data" action = "/tambahkuesioner/" method = "post">
            @csrf
            <div class="modal-content">
                
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Pertanyaan</h4>
                </div>
                
                <div class="modal-body">
                    <span>Pertanyaan </span>
                    <div>
                        <input type='text' style="width: 100%" name='kuesioner' />
                    </div>
                    <span>Persentase </span>
                    <div>
                        <input id="numberbox" name="persentase" type='number' style="width: 10%" maxlength='2' pattern='^[0-9]$' /> %
                    </div>
                </div>
                
                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary input-lg" value="Buat Pertanyaan" />
                </div>
            </div>
        </form>
    </div>
</div>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script >
    var angka = "<?php echo 100-$persentase ?>"
    
    $('#numberbox').keyup(function(){
    if ($(this).val() > angka){
    alert("persentase sudah "+<?php echo $persentase ?>+" Tidak bisa memasukan persentase lebih dari "+angka);
    $(this).val(angka);
  }
});

</script>
@endsection