<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "../excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$id_kelas     = $data->val($i, 1);
	$nis   = $data->val($i, 2);
	$nama  = $data->val($i, 3);
	$jk  = $data->val($i, 4);
	$tgl_lahir  = $data->val($i, 5);
	$alamat  = $data->val($i, 6);
	$foto  = $data->val($i, 7);




	if($id_kelas != "" && $nis != "" && $nama != "" && $jk != "" && $tgl_lahir != "" && $alamat != "" &&  $foto != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT INTO siswa (id_siswa,id_kelas,nis,nama,jk,tgl_lahir,alamat,foto)
    VALUES ('','$id_kelas','$nis','$nama','$jk','$tgl_lahir','$alamat','$foto')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:../admin.php?berhasil=$berhasil");
?>