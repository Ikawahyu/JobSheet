<?php
include 'koneksi.php';
// menangkap data id yang di kirim dari url
$id_jurusan = $_GET['id_jurusan'];

// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM jurusan WHERE id_jurusan='".$id_jurusan."'")or die ("Gagal Perintah SQL".mysql_error());
echo "<script>window.alert('Data Telah Terhapus')
        window.location='admin_jurusan.php'</script>";
?>