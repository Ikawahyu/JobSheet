<?php
include 'koneksi.php';
if(isset($_POST['simpan_jurusan'])){
  $id_jurusan=$_POST['id_jurusan'];
  $nama_jurusan = $_POST['nama_jurusan'];
  $kaprog = $_POST['kaprog'];
  $nip = $_POST['nip'];
//script validasi data
$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM jurusan WHERE nama_jurusan='$nama_jurusan'"));
if ($cek > 0){
echo "<script>window.alert('Data Sudah Tersedia')
window.location='../ubah_jurusan.php'</script>";
}else {
mysqli_query($koneksi,"UPDATE jurusan SET id_jurusan='$id_jurusan',nama_jurusan='$nama_jurusan',kaprog='$kaprog',nip='$nip' WHERE id_jurusan='$id_jurusan'");
echo "<script>window.alert('DATA SUDAH DISIMPAN')
window.location='../admin_jurusan.php'</script>";
}
}
?>