<?php 
session_start();
if ($_SESSION['id_level']=="") {
    header("location:../index.php?pesan=gagal");
}
?>
<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: admin_kelas.php');
}

//ambil id dari query string
$id_kelas = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM kelas WHERE id_kelas=$id_kelas";
$query = mysqli_query($koneksi, $sql);
$kelas = mysqli_fetch_array($query);

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
        <!--<a href="admin_siswa.php" class="list-group-item list-group-item-action bg-light">Data Siswa</a>-->
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

<div class="col-md-10">
        <div class="row">
            <div class="content-box-large">
                <div class="panel-heading">
          <div class="panel-title">Edit Data Kelas</div>
        </div>
                <div class="panel-body">
            <!-- form -->
            <form action="aksi/aksi_ubah_kelas.php" method="post" class="form-horizontal">
            <fieldset>
            <input type="hidden" name="id" value="<?php echo $kelas['id_kelas'] ?>" />
            <div class="form-group">
        <label class="col-md-2 control-label" for="nama_kelas">Nama Kelas</label>
          <div class="col-md-10">
            <input class="form-control" placeholder="Nama Kelas" type="text" name="nama_kelas" value="<?php echo $kelas['nama_kelas'] ?>">
          </div>
      </div>
            
            <div class="form-group">
                <label class="col-md-2 control-label" for="id_jurusan">Jurusan</label>
                <div class="col-md-10">
                    <select name="id_jurusan" class="form-control" id="id_jurusan" required >
                    <option disable selected > Pilih Jurusan </option>
              <?php include 'koneksi.php';
              $data = mysqli_query($koneksi,"SELECT * FROM jurusan");
              while ($d = mysqli_fetch_array($data)){
              ?>
              <option value="<?php echo $d['id_jurusan'];?>">
                <?php echo $d['nama_jurusan'];?>
              </option>
              <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="tingkat">Tingkat</label><?php $tingkat = $kelas['tingkat']; ?>
                <div class="col-md-10">
                    <select name="tingkat" class="form-control" id="select-1">
                        <option <?php echo ($tingkat == '10') ? "selected": "" ?>>10</option>
                        <option <?php echo ($tingkat == '11') ? "selected": "" ?>>11</option>
                        <option <?php echo ($tingkat == '12') ? "selected": "" ?>>12</option>
                    </select>
                </div>
            </div>

            </fieldset>
                <button class="btn btn-primary" type="submit" name="simpan_kelas">
                <i class="glyphicon glyphicon-save"></i>
          Submit
        </button>
            </form>
            </div>
        </div>

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
