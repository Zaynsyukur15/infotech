<?php 

    class koneksidb
    {
        var $conn;

        function __construct()
        {
            $this->conn=new mysqli('localhost','root','','profil');
            if($this->conn)
            {
            }
       
        }

    }
    class crud extends koneksidb
    {
        function tampildata()
        {
            $sql="SELECT * FROM akun ";
            $query=$this->conn->query($sql);
            return $query;
        }
        function simpandata()
        {
            $data=array(
                'id'=>$_POST['id'],
                'nama'=>$_POST['nama'],
                'email'=>$_POST['email'],
                'alamat'=>$_POST['alamat'],
                'pass'=>$_POST['pass'],
                'nomor'=>$_POST['nomor']
            );
            $sql="INSERT INTO akun VALUES('".$data['id']."','".$data['nama']."','".$data['email']."','".$data['alamat']."','".$data['nomor']."','".$data['pass']."')";
            $query=$this->conn->query($sql);
            if($query)
            {
                header('location:../index.php');
            }
            return $query;
            
        }
        function tampilnama($id)
        {
            $sql="SELECT * FROM akun WHERE id='".$id."'";
            $res=$this->conn->query($sql);
            return $res;
        }
        function editdata()
        {
            $data=array(
                'id'=>$_POST['id'],
                'nama'=>$_POST['nama'],
                'email'=>$_POST['email'],
                'alamat'=>$_POST['alamat'],
                'pass'=>$_POST['pass'],
                'nomor'=>$_POST['nomor']
            );
            $sql="UPDATE akun SET nama='".$data['nama']."',email='".$data['email']."',alamat='".$data['alamat']."',nomor='".$data['nomor']."',password='".$data['pass']."' WHERE id='".$data['id']."'";
            $res=$this->conn->query($sql);
            if($res)
            {
                header('location:../index.php');
            }
            return $res;
            
        }
        function deletedata()
        {
            $nama=$_POST['nama'];
            $sql="DELETE FROM akun WHERE nama='".$nama."'";
            $res=$this->conn->query($sql);
            if($res)
            {
                header('location:../index.php');
            }
            else
            {
                echo "hapus data gagal";
            }
            return $res;
        }
        function hasilcari()
        {
            $data=array(
                'nama'=>$_POST['nama']
            );
            $sql="SELECT * FROM akun WHERE nama='".$data['nama']."'";
            $res=$this->conn->query($sql);
            return $res;

        }
        function jumlahdata()
        {
            $sql="SELECT COUNT(id) AS total FROM akun";
            $res=$this->conn->query($sql);
            return $res;
        }
    }

$lib=new crud();
if(isset($_POST['aksi']))
{
    $aksi=$_POST['aksi'];
    if($aksi==1)
    {
        $lib->simpandata();

    }
    else if($aksi==2)
    {
        $res=$lib->editdata();
    }
    else if($aksi==3)
    {
        $res=$lib->deletedata();
    }
    
  
}

?>