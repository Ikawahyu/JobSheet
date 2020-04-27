<?php
include 'koneksi.php';
  $nama_kelas = $_POST['nama_kelas'];
  $id_jurusan = $_POST['id_jurusan'];
  $tingkat = $_POST['tingkat'];
//script validasi data
$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kelas WHERE nama_kelas='$nama_kelas'"));
if ($cek > 0){
echo "<script>window.alert('Data Sudah Tersedia')
window.location='../tambah_kelas.php'</script>";
}else {
mysqli_query($koneksi,"INSERT INTO kelas VALUES('','$nama_kelas','$id_jurusan','$tingkat')");
echo "<script>window.alert('DATA SUDAH DISIMPAN')
window.location='../admin_kelas.php'</script>";
}

?>