<?php 
session_start();
if ($_SESSION['id_level']=="") {
    header("location:../index.php?pesan=gagal");
}
?>
<?php 

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id_jurusan']) ){
    header('Location: admin_jurusan.php');
}

//ambil id dari query string
$id_jurusan = $_GET['id_jurusan'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM jurusan WHERE id_jurusan=$id_jurusan";
$query = mysqli_query($koneksi, $sql);
$jurusan = mysqli_fetch_array($query);

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

<div class="col-md-10">
        <div class="row">
            <div class="content-box-large">
                <div class="panel-heading">
          <div class="panel-title">Edit Data Jurusan</div>
        </div>
                <div class="panel-body">
            <!-- form -->
            <form action="aksi/aksi_ubah_jurusan.php" method="post" class="form-horizontal">
            <fieldset>
            <input type="hidden" name="id_jurusan" value="<?php echo $jurusan['id_jurusan'] ?>" />
            <div class="form-group">
        <label class="col-md-2 control-label" for="nama_jurusan">Nama Jurusan</label>
          <div class="col-md-10">
            <input class="form-control" placeholder="Nama Jurusan" type="text" name="nama_jurusan" value="<?php echo $jurusan['nama_jurusan'] ?>">
          </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="kaprog">Kepala Program</label>
          <div class="col-md-10">
            <input class="form-control" placeholder="kaprog" type="text" name="kaprog" value="<?php echo $jurusan['kaprog'] ?>">
          </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label" for="nip">Nomor Induk Pegawai</label>
          <div class="col-md-10">
            <input class="form-control" placeholder="nip" type="number" name="nip" value="<?php echo $jurusan['nip'] ?>">
          </div>
      </div>

            </fieldset>
                <button class="btn btn-primary" type="submit" name="simpan_jurusan">
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
