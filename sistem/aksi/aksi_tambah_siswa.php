<?php
include 'koneksi.php';
  $id_kelas = $_POST['id_kelas'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk= $_POST['jk'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $alamat = $_POST['alamat'];


  //upload function
  $foto   = $_FILES['foto']['name'];
  $temp   = $_FILES['foto']['tmp_name'];

  $fotobaru = date('dmYHis').$foto;

  $path = "../images/".$fotobaru;

    if( move_uploaded_file($temp,$path) ) {
      //script validasi data
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'"));
        if ($cek > 0){
        echo "<script>window.alert('Data Sudah Tersedia')
        window.location='../admin.php'</script>";
        }
        else {
        $query="INSERT INTO siswa VALUES('','".$id_kelas."','".$nis."','".$nama."','".$jk."','".$tgl_lahir."','".$alamat."','".$fotobaru."')";
        $sql= mysqli_query($koneksi,$query);
          if($sql){ 
          echo "<script>window.alert('DATA SUDAH DISIMPAN') 
          window.location='../admin.php'</script>";
          }
          else{
            echo "<script>window.alert('terjadi kesalahan') 
          window.location='../tambah_siswa.php'</script>";
          }
        }
    }else{
      echo "<script>window.alert('Gagal Upload Gambar') 
          window.location='../tambah_siswa.php'</script>";
    }
        
?>