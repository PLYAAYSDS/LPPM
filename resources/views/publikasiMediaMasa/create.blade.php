@extends('layouts/master')
@section('content')

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>

<main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
          <div class="card-details">
            <h3 class="title">Publikasi Media Massa</h3>
            <div class="row">
              <form enctype="multipart/form-data" action="/buatmediamasa" method = "post">
              @csrf
              <div class="form-group col-sm-7">
                <label for="card-holder">Tahun Publikasi</label>
                <input id="luaran_tahun" type="text" class="form-control" placeholder="Tahun Publikasi" name="luaran_tahun">
              </div>
              <div class="form-group col-sm-7">
                <label for="card-holder">Tanggal Publikasi</label>
                <input id="luaran_tanggal_publikasi" type="text" class="form-control" placeholder="Tanggal Publikasi" name="luaran_tanggal_publikasi">
              </div>
              <div class="form-group col-sm-7">
                <label for="card-holder">Jenis Publikasi Jurnal</label>
                <select name="luaran_jenis" id="luaran_jenis" class="form-control">
                  <option value="" disabled selected hidden>Pilih Jenis Jurnal</option>
                  <option value="Jurnal Internasional">Jurnal Internasional</option>
                  <option value="Jurnal Nasional Terakreditasi">Jurnal Nasional Terakreditasi</option>
                  <option value="Jurnal Nasional Tidak Terakreditasi (ISSN)">Jurnal Nasional Tidak Terakreditasi (ISSN)</option>
                </select>
              </div>
              <div class="form-group col-sm-7">
                <label for="card-holder">Jenis Publikasi Jurnal</label>
                <select name="luaran_jenis_media" id="luaran_jenis_media" class="form-control">
                  <option value="" disabled selected hidden>Pilih Jenis Media</option>
                  <option value="Koran">Koran</option>
                  <option value="Majalah">Majalah</option>
                  <option value="Tabloid">Tabloid</option>
                  <option value="Radio">Radio</option>
                  <option value="Televisi">Televisi</option>
                  <option value="Media Online">Media Online</option>
                </select>
              </div>
              <div class="form-group col-sm-7">
                <label for="card-holder">Nama Media</label>
                <input id="luaran_nama" type="text" class="form-control" placeholder="Nama Media" name="luaran_nama" >
              </div>
              <div class="form-group col-sm-7">
                <label for="card-holder">Volume</label>
                <input id="luaran_volume" type="text" class="form-control" placeholder="Volume"  name="luaran_volume" >
              </div>
              <div class="form-group col-sm-7">
                <label for="card-holder">Nomor</label>
                <input id="luaran_nomor" type="text" class="form-control" placeholder="Nomor"  name="luaran_nomor"  >
              </div>
              <div class="form-group col-sm-7">
                <label for="">Halaman</label>
                <div class="input-group expiration-date">
                  <input type="text" id="luaran_halaman_awal" class="form-control" placeholder="Halaman Awal"  name="luaran_halaman_awal" >
                  <span class="date-separator">s/d</span>
                  <input type="text" id="luaran_halaman_akhir" class="form-control" placeholder="Halaman Akhir" name="luaran_halaman_akhir" >
                </div>
              </div>
              <div class="form-group col-sm-7">
                <label for="card-number">URL</label>
                <input id="luaran_url" type="text" class="form-control" placeholder="URL media massa"  name="luaran_url"  >
              </div>
                <div class="form-group col-sm-7" id="dynamic_field_dosen">
                  <label for="card-number">Penulis Dosen</label>
                    <select name="dosen[]" id="dosen1" required="required" class="form-control">
                        <option></option>
                        @foreach($dosen as $Pegawai)
                        <option value="{{$Pegawai->pegawai_id}}" >{{$Pegawai->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-5">
                <br>
                  <button type="button" name="add" id="addMoreDosen" class="btn btn-success">Add More</button>
                </div>
                <div class="form-group col-sm-7" id="dynamic_field_mahasiswa">
                  <label for="card-number">Anggota Mahasiswa</label>
                    <select name="mahasiswa[]" id="mahasiswa1" required="required" class="form-control">
                        <option></option>
                        @foreach($mahasiswa as $mahasiswas)
                        <option value="{{$mahasiswas->dim_id}}" >{{$mahasiswas->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-5">
                <br>
                  <button type="button" name="add" id="addMoreMahasiswa" class="btn btn-success">Add More</button>
                </div>
                <div class="form-group col-sm-7" id="dynamic_field_Staff">
                  <label for="card-number">Anggota Staff</label>
                    <select name="pegawai[]" id="pegawai1" required="required" class="form-control">
                        <option></option>
                        @foreach($pegawai as $pegawai)
                        <option value="{{$pegawai->pegawai_id}}" >{{$pegawai->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-5">
                <br>
                  <button type="button" name="add" id="addMoreStaff" class="btn btn-success">Add More</button>
                </div>
                <div class="form-group col-sm-7">
                  <label for="card-number">File</label>
                    <input type="file" name="Luaran" value=" "required="required"/>
                </div>
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
              </div>
            </div>
          </div> 
        </form>
      </div>
    </section>
  </main>  
</body>

<script type="text/javascript">


//dynamic form
    $(document).ready(function(){      
      var postURL = "<?php echo url('buatjurnal'); ?>";
      var i=1;  


  

      $('#addMoreDosen').click(function(){  
           i++;  
           $('#dynamic_field_dosen').append('<tr id="row'+i+'" class="dynamic-added">'+
                                '<td>'+
                                '<div>'+
                                '<select name="dosen[]" style="width: 940px" placeholder="Pilih nama" id="dosen" required="required" >'+
                                    '<option></option>'+
                                    '@foreach($dosen as $Pegawai)'+
                                    '<option value="{{$Pegawai->pegawai_id}}" >{{$Pegawai->nama}}</option>'+
                                    '@endforeach'+
                                '</select>'+                     
                                '</div>'+
                                '</td>'+
                        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
 
      }); 

      $('#addMoreMahasiswa').click(function(){  
           i++;  
           $('#dynamic_field_mahasiswa').append('<tr id="row'+i+'" class="dynamic-added">'+
                                '<td>'+
                                '<select name="mahasiswa[]" style="width: 940px" placeholder="Pilih nama" id="mahasiswa" required="required">'+
                                    '<option></option>'+
                                    '@foreach($mahasiswa as $mahasiswas)'+
                                    '<option value="{{$mahasiswas->dim_id}}" >{{$mahasiswas->nama}}</option>'+
                                    '@endforeach'+
                                '</select>'+
                                '</td>'+
                        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');


      }); 


      $('#addMoreStaff').click(function(){  
           i++;  
           $('#dynamic_field_Staff').append('<tr id="row'+i+'" class="dynamic-added">'+
                                '<td>'+
                                '<div>'+
                                '<select name="dosen[]" style="width: 940px" placeholder="Pilih nama" id="dosen" required="required" >'+
                                    '<option></option>'+
                                    '@foreach($dosen as $Pegawai)'+
                                    '<option value="{{$Pegawai->pegawai_id}}" >{{$Pegawai->nama}}</option>'+
                                    '@endforeach'+
                                '</select>'+                     
                                '</div>'+
                                '</td>'+
                        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
 
      }); 

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });

      
      



      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });

</script>

@endsection