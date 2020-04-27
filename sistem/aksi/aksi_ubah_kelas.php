
<?php
include 'koneksi.php';
if(isset($_POST['simpan_kelas'])){
  $id_kelas=$_POST['id'];
  $nama_kelas = $_POST['nama_kelas'];
  $id_jurusan = $_POST['id_jurusan'];
  $tingkat = $_POST['tingkat'];
//script validasi data
$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kelas WHERE nama_kelas='$nama_kelas'"));
if ($cek > 0){
echo "<script>window.alert('Data Sudah Tersedia')
window.location='../ubah_kelas.php'</script>";
}else {
mysqli_query($koneksi,"UPDATE kelas SET nama_kelas='$nama_kelas',id_jurusan='$id_jurusan',tingkat='$tingkat' WHERE id_kelas='$id_kelas'");
echo "<script>window.alert('DATA SUDAH DISIMPAN')
window.location='../admin_kelas.php'</script>";
}
}
?>