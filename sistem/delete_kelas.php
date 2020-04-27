<?php
include 'koneksi.php';
// menangkap data id yang di kirim dari url
$id_kelas = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='".$id_kelas."'")or die ("Gagal Perintah SQL".mysql_error());
echo "<script>window.alert('Data Telah Terhapus')
        window.location='admin_kelas.php'</script>";
?>