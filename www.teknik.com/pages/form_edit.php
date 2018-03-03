
<div class="container down">
<div class="panel panel-default">
<div class="panel-heading">
Perbarui Akun
</div>
<div class="panel-body">
<?php 
$id=$_GET['id'];
include ('../pages/config.php');
$res=$lib->tampilnama($id);
while($row=$res->fetch_row())
{
    ?>
<div class="form-group">
<i class="fa fa-user-plus size"></i>
<input type="hidden" id="id" class="form-control" value="<?php echo $row[0];?>">
<input type="text" id="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $row[1];?>">
</div>
<div class="form-group">
<i class="fa fa-envelope size"></i>
<input type="text" id="email" class="form-control" placeholder="Email" value="<?php echo $row[2];?>">
</div>
<div class="form-group">
<i class="fa fa-road size"></i>
<input type="text" id="alamat" class="form-control" placeholder="Alamat" value="<?php echo $row[3];?>">
</div>
<div class="form-group">
<i class="fa fa-phone size"></i>
<input type="number" id="nomor" class="form-control" placeholder="Nomor" value="<?php echo $row[4];?>">
</div>
<div class="form-group">
<i class="fa fa-key size"></i>
<input type="password" id="pass" class="form-control" placeholder="Password" value="<?php echo $row[5];?>">
</div>
<?php
}
?>
<button type="button" class="btn btn-success btn_update"><i class="fa fa-edit"></i> Perbarui</button>
<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Batal</button>
</div>
</div>
</div>
<script>
$('.btn_update').click(function()
{

    var aksi=2;
    
    var data={
      id:$('#id').val(),
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
        data:'nama='+data.nama+'&aksi='+aksi+'&email='+data.email+'&alamat='+data.alamat+'&pass='+data.pass+'&id='+data.id+'&nomor='+data.nomor,
        success:function(html)
        {
      $('.container').html(html);
        }
    }
);
});

</script>


