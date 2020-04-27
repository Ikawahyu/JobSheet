<?php
include 'koneksi.php';
// menangkap data id yang di kirim dari url
$id_siswa = $_GET['id_siswa'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM siswa WHERE id_siswa='".$id_siswa."'")or die ("Gagal Perintah SQL".mysql_error());
echo "<script>window.alert('Data Telah Terhapus')
        window.location='admin.php'</script>";
?>