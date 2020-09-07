@extends('layouts.master')
@section('content')
<head>
<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    

</head>
<body>

<div class="container-fluid">
    <form enctype="multipart/form-data" action = "/update/{{$penelitian->proposal_penelitian_id}}" method = "post">
        @csrf
            <div id="proposal">

                
                <h4 class="form-group text-center"><b>Form Pengajuan</b></h4>

                <hr>
                <table class="table table-bordered">
                    <tr>
                        <td><span><b> Jenis Penelitian: </b></span></td>
                        <td>
                        <div>
                            <select name="jenis" style="width: 1000px" id="jenis" required="required">
                                <option></option>
                                @foreach($jenispenelitian as $jenis)
                                <option value="{{$jenis->jenis_penelitian_id}}" >{{$jenis->jenis_penelitian_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        </td>
                    </tr>

                    <tr>
                    <td><span><b>Bidang: </b></span></td>
                    <td>
                    <div>
                        <select name="bidang" style="width: 1000px" id="nameid" required="required">
                            <option></option>
                            @foreach($bidang as $bidang)
                            <option value="{{$bidang->bidang_penelitian_id}}" >{{$bidang->bidang_penelitian_nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    </td>
                    </tr>


                    <tr>
                    <td><span><b> Tujuan Sosial & Ekonomi: </b></span></td>
                    
                    <td>
                        <div>
                        <select name="tujuan" style="width: 1000px" id="tujuan" required="required">
                            <option></option>
                            @foreach($tujuan_sosial_ekonomi as $tujuan)
                            <option value="{{$tujuan->tujuan_sosial_ekonomi_id}}" >{{$tujuan->tujuan_sosial_ekonomi_nama}}</option>
                            @endforeach
                        </select>
                        </div>
                    </td>
                    
                    </tr>

                    <tr>
                    <div >
                        <td><label >Judul</label></td>
                        <td>
                        <div style="width: 1000px">
                            <input type="text" name="judul" value="{{$penelitian->proposal_penelitian_judul}}" required="required" class="form-control input" />
                        </div>
                        </td>
                    </div>
                    </tr>


                    <tr>
                    <div >
                        <td><label >Tahun Diajukan</label></td>
                        <td>
                        <div>
                            <select name="tahun" style="width: 1000px" id="tahun">
                                <option></option>
                                <?php
                                for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                echo "<option value='".$i."'> ".$i." </option>";
                                }
                                ?>
                            </select>                  
                        </div>
                        </td>
                    </div>
                    </tr>

                    <tr>
                    <div >
                        <td><label >Tahun Dilaksanakan</label></td>
                        <td>
                        <div>
                            <select name="tahun1" style="width: 1000px" id="tahun1">
                                <option></option>
                                <?php
                                for($i=date('Y'); $i<=date('Y')+32; $i+=1){
                                echo "<option value='".$i."'> ".$i." </option>";
                                }
                                ?>
                            </select>                  
                        </div>
                        </td>
                    </div>
                    </tr>

                    <tr>
                    <div >
                        
                    <td><label>Jumlah Dana: </label></td>
                        <td>
                        <div style="width: 1000px">
                            <input type="text" name="dana" id="rupiah" value="{{$penelitian->proposal_penelitian_jumlah_dana}}" required="required" class="form-control input" />
                        </div>
                        </td>
                    </div>
                    </tr>
                    
                    <tr>
                    <div >
                        <td><label>Ketua Peneliti: </label></td>
                        <td>
                        <div style="width: 1000px">
                            <input type="text" name="ketua" value="{{$penelitian->proposal_penelitian_ketua}}" required="required" class="form-control input" />
                        </div>
                        </td>
                    </div>
                    </tr>
                    <hr>
                    
                </table>
                <table width=100% style="margin-top:10px">
                    <tr>
                        <td colspan="3" style="background-color:#000;">
                            <h6 style="color:#fff"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Anggota Dosen</h6>
                        </td>
                    </tr>
                    <tr>
                        <td width=5%>No.</td>
                        <td widtg=85%>Nama</td>
                        <td widtg=10%>Aksi</td>
                    </tr>
                            <?php
                                $i=1;
                            ?>
                            @foreach($anggotaDosen as $agt)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$agt->nama}}</td>
                                <td><a href="{{ route('data.destroy',$agt->angggota_dosen_id) }}" style="color:#FF0000"><b>Delete</b></a></td>
                            </tr>
                            <?php 
                                $i++;
                            ?>
                            @endforeach
                </table>


                <table class="table table-bordered" id="dynamic_field1">  
                    <tr>  
                 
                        <td><label style="width: 180px" >Tambah Anggota Dosen: </label></td>
                    </tr>
                    <tr>
                        <td>
                        <div>
                                <select name="dosen[]" style="width: 940px" placeholder="Pilih nama" id="dosen">
                                    <option></option>
                                    @foreach($dosen as $Pegawai)
                                    <option value="{{$Pegawai->pegawai_id}}" >{{$Pegawai->nama}}</option>
                                    @endforeach
                                </select>
                        </div>
                        </td>

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr> 
                </table>
                <table width=100% style="margin-top:10px">
                    <tr>
                        <td colspan="3" style="background-color:#000;">
                            <h6 style="color:#fff"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Anggota Staff Pengajar</h6>
                        </td>
                    </tr>
                    <tr>
                        <td width=5%>No.</td>
                        <td widtg=85%>Nama</td>
                        <td widtg=10%>Aksi</td>
                    </tr>   
                            <?php
                                $i=1;
                            ?>
                            @foreach($staff as $agt)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$agt->nama}}</td>
                                <td><a href="{{ route('staff.destroy',$agt->anggota_staff_pengajar_id) }}" style="color:#FF0000"><b>Delete</b></a></td>
                            </tr>
                            <?php 
                                $i++;
                            ?>
                            @endforeach
                </table>

                <table class="table table-bordered" id="dynamic_field2">  
                    <tr>  
                 
                        <td><label style="width: 180px" >Tambah Staff Pengajar: </label></td>
                    </tr>
                    <tr>
                        <td>
                        <div>
                                <select name="pegawai[]" style="width: 940px" placeholder="Pilih nama" id="pegawai"  >
                                    <option></option>
                                    @foreach($pegawai as $data)
                                    <option value="{{$data->pegawai_id}}" >{{$data->nama}}</option>
                                    @endforeach
                                </select>
                        </div>
                        </td>

                        <td><button type="button" name="add" id="add1" class="btn btn-success">Add More</button></td>  
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
                        <td widtg=85%>Nama</td>
                        <td widtg=10%>Aksi</td>
                    </tr>   
                            <?php
                                $i=1;
                            ?>
                            @foreach($datamahasiswa as $agt)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$agt->nama}}</td>
                                <td><a href="{{ route('mahasiswa.destroy',$agt->anggota_non_dosen_id) }}" style="color:#FF0000"><b>Delete</b></a></td>
                            </tr>
                            <?php 
                                $i++;
                            ?>
                            @endforeach
                </table>
                
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
               
                        <td><label style="width: 180px">Tambah Anggota Mahasiswa:</label></td>
                    </tr>
                    <tr>
                        <td>
                        <div>
                                <select name="mahasiswa[]" style="width: 940px" placeholder="Pilih nama" id="mahasiswa" >
                                    <option></option>
                                    @foreach($mahasiswa as $data)
                                    <option value="{{$data->dim_id}}" >{{$data->nama}}</option>
                                    @endforeach
                                </select>
                        </div>
                        </td>

                        <td><button type="button" name="add" id="add2" class="btn btn-success">Add More</button></td>  
                    </tr>
                </table>
                

                
                  
                

                <table class="table table-bordered">
                <tr>
                    <div>
                        <td><label style="width: 172px">Rab: </label></td>
                        <td>
                        <div style="width: 1000px">
                            <input type="file" name="Rab" value=" "required="required" accept=".xls,.xlsx"  />
                        </div>
                        </td>
                    </div>
                    </tr>

                    <tr>
                    <div>
                        <td><label style="width: 172px">Proposal: </label></td>
                        <td>
                        <div style="width: 1000px">
                            <input type="file" name="Proposal" value=" "required="required" accept=".pdf"  />
                        </div>
                        </td>
                    </div>
                    </tr>
                </table>
                



                <div >
                    <input type="submit" name="submit" class="btn btn-warning" value="Update Pengajuan" />
                </div>
            </div>
               
       

    
    </form>

</div>




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script >
    $("#nameid").select2({
        placeholder: 'Pilih Bidang Penelitian',
        allowClear: true
    });
    
</script>
<script>
 $('#dosen2').select2({
        placeholder: 'Pilih Dosen',
        allowClear: true
      });
</script>
<script >
    $("#jenis").select2({
        placeholder: 'Pilih Jenis Penelitian',
        allowClear: true
    });
    
</script>

<script >
    $("#luaran").select2({
        placeholder: 'Pilih Luaran',
        allowClear: true
    });
    
</script>

<script >
    $("#tujuan").select2({
        placeholder: 'Pilih Tujuan Sosial & Ekonomi',
        allowClear: true
    });
    
</script>


<script >
    $("#mahasiswa").select2({
        placeholder: 'Pilih Mahasiswa',
        allowClear: true
    });
    
</script>
<script >
    $("#dosen").select2({
        placeholder: 'Pilih Dosen',
        allowClear: true
    });    
</script>

<script >
    $("#pegawai").select2({
        placeholder: 'Pilih Staff Pengajar',
        allowClear: true
    });    
</script>


<script >
    $("#tahun").select2({
        placeholder: 'Pilih Tahun Diajukan',
        allowClear: true
    });    
</script>

<script >
    $("#tahun1").select2({
        placeholder: 'Pilih Tahun Dilaksanakan',
        allowClear: true
    });    
</script>


    <script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value,'Rp.');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp.' +rupiah : '');
		}
	</script>

<script type="text/javascript">
    
    

    $(document).ready(function(){      
      var postURL = "<?php echo url('pengajuanpenelitian'); ?>";
      var i=1;  


  

      $('#add').click(function(){  
           i++;  
           $('#dynamic_field1').append('<tr id="row'+i+'" class="dynamic-added">'+
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

      $('#add1').click(function(){  
           i++;  
           $('#dynamic_field2').append('<tr id="row'+i+'" class="dynamic-added">'+
                                '<td>'+
                                '<select name="pegawai[]"  style="width: 940px" placeholder="Pilih nama" id="pegawai" required="required">'+
                                    '<option></option>'+
                                    '@foreach($pegawai as $data)'+
                                    '<option value="{{$data->pegawai_id}}" >{{$data->nama}}</option>'+
                                    '@endforeach'+
                                '</select>'+
                                '</td>'+
                        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
 
      });

      $('#add2').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
                                '<td>'+
                                '<select name="mahasiswa[]" style="width: 940px" placeholder="Pilih nama" id="mahasiswa" required="required">'+
                                    '<option></option>'+
                                    '@foreach($mahasiswa as $data)'+
                                    '<option value="{{$data->dim_id}}" >{{$data->nama}}</option>'+
                                    '@endforeach'+
                                '</select>'+
                                '</td>'+
                        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');


      }); 
    
      
     

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });

      $(document).ready(function () {

        $("body").on("click","#deleteDosen",function(e){

        if(!confirm("Do you really want to do this?")) {
            return false;
            }

        e.preventDefault();
        var id = $(this).data("id");
        // var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;

        $.ajax(
            {
                url: url.href, //or you can use url: "company/"+id,
                type: 'DELETE',
                data: {
                _token: token,
                    id: id
            },
            success: function (response){

                $("#success").html(response.message)

                Swal.fire(
                    'Remind!',
                    'Company deleted successfully!',
                    'success'
                )
            }
            });
            return false;
        });
        

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


    });

  
</script>

</body>
@endsection