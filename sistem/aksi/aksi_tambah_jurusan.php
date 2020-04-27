<?php
include 'koneksi.php';
  $nama_jurusan = $_POST['nama_jurusan'];
  $kaprog = $_POST['kaprog'];
  $nip = $_POST['nip'];
//script validasi data
$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM jurusan WHERE nama_jurusan='$nama_jurusan'"));
if ($cek > 0){
echo "<script>window.alert('Data Sudah Tersedia')
window.location='../tambah_jurusan.php'</script>";
}else {
mysqli_query($koneksi, "INSERT INTO jurusan VALUES('','$nama_jurusan','$kaprog','$nip')");
echo "<script>window.alert('DATA SUDAH DISIMPAN')
window.location='../admin_jurusan.php'</script>";
}

?>