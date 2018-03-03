<div class="container down">
<div class="panel panel-default">
<div class="panel-heading">
Tambah Akun
</div>
<div class="panel-body">
<div class="form-group">
<i class="fa fa-user-plus size"></i>
<input type="text" id="nama" class="form-control" placeholder="Nama Lengkap">
</div>
<div class="form-group">
<i class="fa fa-envelope size"></i>
<input type="text" id="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
<i class="fa fa-road size"></i>
<input type="text" id="alamat" class="form-control" placeholder="Alamat">
</div>
<div class="form-group">
<i class="fa fa-phone size"></i>
<input type="number" id="nomor" class="form-control" placeholder="Nomor" max="12">
</div>
<div class="form-group">
<i class="fa fa-key size"></i>
<input type="password" id="pass" class="form-control" placeholder="Password">
</div>

<button type="button" class="btn btn-success btn_save"><i class="fa fa-save"></i> Simpan</button>
<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Batal</button>
</div>
</div>
</div>
<script>
$('.btn_save').click(function()
{
    var id=Math.floor((Math.random()* 12345678999999));

    var aksi=1;
    
    var data={
      nama:$('#nama').val(),
      email:$('#email').val(),
      alamat:$('#alamat').val(),
      pass:$('#pass').val(),
      nomor:$('#nomor').val()
    
  };
$.ajax(
    {
        url:'pages/config.php',
        type:'POST',
        data:'nama='+data.nama+'&aksi='+aksi+'&email='+data.email+'&alamat='+data.alamat+'&pass='+data.pass+'&id='+id+'&nomor='+data.nomor,
        success:function(html)
        {
         $('.container').html(html);
        }
    }
);
});

</script>


