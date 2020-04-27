<?php
include 'koneksi.php';
  $id_siswa=$_POST['id_siswa'];
  $id_kelas = $_POST['id_kelas'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk= $_POST['jk'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $alamat = $_POST['alamat'];

if(isset($_POST['ubah_foto'])){
      $foto   = $_FILES['foto']['name'];
      $temp   = $_FILES['foto']['tmp_name'];

      $fotobaru = date('dmYHis').$foto;

      $path = "../images/".$fotobaru;
    //proses upload
    if( move_uploaded_file($temp,$path)) {
      $cek = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
      $pro = mysqli_query($koneksi, $cek);
      $siswa = mysqli_fetch_array($pro);
          //cek foto
          if (is_file("../images/".$siswa['foto'])) unlink("../images/".$siswa['foto']);
    //update
    $query="UPDATE siswa SET id_kelas='$id_kelas',nis='$nis',nama='$nama',jk='$jk',tgl_lahir='$tgl_lahir',alamat='$alamat',foto='$fotobaru' WHERE id_siswa='$id_siswa'";
    $sql= mysqli_query($koneksi,$query);
    //validasi
      if($sql){ 
      echo "<script>window.alert('DATA SUDAH DISIMPAN') 
      window.location='../admin.php'</script>";
      }
      else{
        echo "<script>window.alert('Terjadi Kesalahan Saat Menyimpan') 
        window.location='../ubah_siswa.php'</script>";
      }
    }else{
      echo "<script>window.alert('Gagal Upload Gambar') 
      window.location='../ubah_siswa.php'</script>";
    }
}else{
//tidak ceklis edit foto
$query="UPDATE siswa SET id_kelas='$id_kelas',nis='$nis',nama='$nama',jk='$jk',tgl_lahir='$tgl_lahir',alamat='$alamat' WHERE id_siswa='$id_siswa'";
$sql= mysqli_query($koneksi,$query);
//validasi
if($sql){ 
  echo "<script>window.alert('DATA SUDAH DISIMPAN')
  window.location='../admin.php'</script>";
  }else{
    echo "<script>window.alert('Terjadi Kesalahan Saat') 
      window.location='../ubah_siswa.php'</script>";
  }
}
?>