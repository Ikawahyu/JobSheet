<?php 
session_start();
if ($_SESSION['id_level']=="") {
    header("location:../index.php?pesan=gagal");
}
?>
<?php

include("koneksi.php");

//ambil id dari query string
$id_siswa = $_GET['id_siswa'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE id_siswa='".$id_siswa."'";
$query = mysqli_query($koneksi, $sql);
$siswa = mysqli_fetch_array($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <link href="css/styles.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">SMK LUGINA</div>
      <div class="list-group list-group-flush">
        <a href="admin.php" class="list-group-item list-group-item-action bg-light">Data Siswa</a>
       <!-- <a href="admin_siswa.php" class="list-group-item list-group-item-action bg-light">Data Siswa</a>-->
        <a href="admin_jurusan.php" class="list-group-item list-group-item-action bg-light">Jurusan</a>
        <a href="admin_kelas.php" class="list-group-item list-group-item-action bg-light">Kelas</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"> <> Navigasi</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Option
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../logout.php">Log Out</a>
               
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
<!-- Corosel -->
<form method="post" class="form-horizontal" action="aksi/aksi_ubah_siswa.php?id_siswa=<?php echo $id_siswa; ?>" enctype="multipart/form-data">
            <fieldset>
            <input type="hidden" name="id_siswa" value="<?php echo $siswa['id_siswa'] ?>" />
				<div class="form-group">
                    <label class="col-md-2 control-label" for="id_kelas">Kelas</label>
                    <div class="col-md-10">
							<select name="id_kelas" class="form-control" id="id_kelas">
							<option disable selected> Pilih Kelas</option>
							<?php 
								include 'koneksi.php';
								$result = mysqli_query($koneksi,"SELECT kelas.id_kelas,kelas.nama_kelas,kelas.tingkat,kelas.id_jurusan,jurusan.nama_jurusan,jurusan.kaprog FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
								while($d = mysqli_fetch_array($result)){
									?>
								<option value="<?php echo $d['id_kelas']; ?>" <?php echo $siswa['id_kelas'] === $d['id_kelas'] ? "selected" : "" ?>><?php echo $d['nama_kelas']; ?>-<?php echo $d['tingkat']; ?>
								</option>
							<?php } ?>
                        </select>

                        </div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nis">NIS</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nomor Induk Siswa" type="text" name="nis" value="<?php echo $siswa['nis'] ?>">
						</div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="nama">Nama Lengkap</label>
						<div class="col-md-10">
							<input class="form-control" placeholder="Nama Lengkap" type="text" name="nama" value="<?php echo $siswa['nama'] ?>">
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="jk" <?php $jk = $siswa['jk']; ?>>Jenis Kelamin</label>
					<div class="col-md-10">
                        <select name="jk" class="form-control" id="jk">
                            <option <?php echo ($jk == 'Laki-laki') ? "selected": "" ?>>Laki-laki</option>
                            <option <?php echo ($jk == 'Perempuan') ? "selected": "" ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="tgl_lahir">Tanggal Lahir</label>
						<div class="col-md-10">
                        <input class="form-control bfh-datepicker" placeholder="Tanggal Lahir" type="date" name="tgl_lahir" value="<?php echo $siswa['tgl_lahir'] ?>">
						</div>
				</div>
                <div class="form-group">
					<label class="col-md-2 control-label" for="alamat">Alamat</label>
						<div class="col-md-10">
                        <textarea class="form-control" placeholder="Alamat Lengkap" rows="4" name="alamat" value=""><?php echo $siswa['alamat'] ?></textarea>
						</div>
				</div>
                
                <div class="form-group">
					<label class="col-md-2 control-label" for="foto">Foto</label>
						<div class="col-md-10">
                            <input type="checkbox" name="ubah_foto" value="true"> Ceklis Untuk Mengubah Foto <br>
                            <input class="form-control" type="file" name="foto"></input>
						</div>
				</div>
            </fieldset>
                <button class="btn btn-primary" type="submit" name="simpan">
					<i class="glyphicon glyphicon-save"></i>
					Submit
				</button>
            </form>
<!-- akhir corosel-->
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
