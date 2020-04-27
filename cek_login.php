<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['id_level']=="1"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = "1";
		// alihkan ke halaman dashboard admin
		header("location:sistem/admin.php");

	// cek jika user login sebagai pegawai
	}else if($data['id_level']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = "2";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_pegawai.php");
		

	// cek jika user login sebagai pengurus
	}else if($data['id_level']=="3"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id_level'] = "3";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_pengurus.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}



?>