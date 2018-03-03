<table class="table table-bordered">
<tr>
<thead>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Alamat</th>
<th>Nomorr</th>
<th>Aksi</th>
</thead>
</tr>
<?php include ('../pages/config.php');
$nama=$_POST['nama'];
   $res=$lib->hasilcari($nama);
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
    <button class="btn btn-danger btn_hapus" id="<?php echo $row[0];?>"><i class="fa fa-trash"></i> Hapus</button>
    </td>
   </tbody>
   </tr>
   <?php
   }
}
   ?>
</table>
<button type="submit" class="btn btn-primary btn_kembali"> Kembali</button>

<script>
$('.btn_kembali').click(function()
{
    $('body').load('index.php');
});
</script>