<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1 style="text-align: center;">Data Siswa Berdasarkan Kelas</h1>	
		<table border="1">
			<tr>
				<th>NO</th>
				<th>Kelas</th>
				<th>jurusan</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Gender</th>
				<th>TTL</th>
				<th>Alamat</th>
				<th>Foto</th>
			</tr>';

					
                           

		include "koneksi.php";
		$id =$_GET["id_kelas"];
		$no =1;

		$query = "SELECT siswa.id_siswa,siswa.nis,siswa.nama,siswa.jk,siswa.tgl_lahir,siswa.alamat,siswa.foto,siswa.id_kelas,kelas.nama_kelas,kelas.tingkat,kelas.id_jurusan,jurusan.nama_jurusan,jurusan.kaprog FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan where kelas.id_kelas='$id' ";
		$sql = mysqli_query($koneksi, $query);

		while($data = mysqli_fetch_array($sql)){
			$html .='<tr>
				<td>'. $no++.'</td>
				<td>'. $data["tingkat"].'</td>
				<td>'. $data["nama_jurusan"].'</td>
				<td>'. $data["nis"].'</td>
				<td>'. $data["nama"].'</td>
				<td>'. $data["jk"].'</td>
				<td>'. $data["tgl_lahir"].'</td>
				<td>'. $data["alamat"].'</td>
				"<td><img src="images/'.$data["foto"].'" width="50" height="50"></td>

			</tr>';
		}
$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
