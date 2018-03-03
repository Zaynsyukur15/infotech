<?php
include ('pages/config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="icon/css/fontawesome-all.min.css" />
    <script src="api/jquery-3.3.1.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
</head>
<style>
.down{
    margin-top:60px;
}
.size{
    font-size:40px;
}
</style>
<body>
    
    <div class="container down">
    <hr>
    <div class="form-inline">
   
    <button type="submit" class="btn btn-primary btn_tambah"><i class="fa fa-user-plus"></i> Tambah Akun</button>
    <input type="text" id="cari" class="form-control" placeholder="Pencarian">
    <button class="btn btn-warning btn_cari"><i class="fa fa-search"></i> Cari data</button>
    </div>
    <hr>
    <?php
    $res=$lib->jumlahdata();
    while($row=$res->fetch_object())
    {
    
    ?>
    <ul class="list-group">
    <li class="list-group-item active">Jumlah data<span class="badge"><?php echo $row->total;?></span></li>
    </ul>
    <?php
    }
    ?>
    <hr>
    <table class="table table-bordered">
    <tr>
    <thead>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Alamat</th>
    <th>Nomor</th>
    <th>Aksi</th>
    </thead>
    </tr>
   <?php
   $res=$lib->tampildata();
   $no=1;
   $cek=$res->num_rows;
   if($cek ==0)
   {
       echo "<td colspan='6'>Tidak ada data</td>";
   }
   else
{

   while($row=$res->fetch_row())
   {
       ?>
   <tr>
   <tbody>
   <td><?php echo $no++;?></td>
   <td><?php echo $row[1];?></td>
   <td><?php echo $row[2];?></td>
   <td><?php echo $row[3];?></td>
   <td><?php echo $row[4];?></td>
    <td><button class="btn btn-info btn_lihat" id="<?php echo $row[0];?>"><i class="fa fa-edit"></i> Perbarui</button>
    <button class="btn btn-danger btn_hapus" id="<?php echo $row[1];?>"><i class="fa fa-trash"></i> Hapus</button>
    </td>
   </tbody>
   <?php
   }
}
   ?>
     <hr>
   </table>
   </div>
  
<script>
$('.btn_tambah').click(function()
{
    $('body').load('pages/form_input.php');
});
$('.btn_lihat').click(function()
{
    var id=$(this).attr('id');
    $.ajax(
        {
        url:'pages/form_edit.php',
        type:'GET',
        data:'id='+id,
        success:function(html)
        {
            $('body').html(html);
        }
    });
});
$('.btn_hapus').click(function()
{
   var nama=$(this).attr('id');
    var aksi=3;
    $.ajax(
        {
        url:'pages/config.php',
        type:'POST',
        data:'nama='+nama+'&aksi='+aksi,
        success:function(html)
        {
            $('body').html(html);
        }
    });
});
$('.btn_cari').click(function()
{
    var nama=$('#cari').val();
    var aksi=4;
    $.ajax(
        {
        url:'pages/form_cari.php',
        type:'POST',
        data:'nama='+nama+'&aksi='+aksi,
        success:function(html)
        {
            $('body').html(html);
        }
    });
});
</script>
</body>
</html>