<?php 
session_start();
if ($_SESSION['id_level']=="") {
    header("location:../index.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Siswa</title>

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
            
            <!--<li class="nav-item">
              <a class="nav-link" href="tambah_siswa.php">Tambah Data Siswa</a>
            </li>-->
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

<form action="aksi/aksi_tambah_siswa.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>
        <div class="form-group">
                    <label class="col-md-2 control-label" for="id_kelas">Kelas</label>
                    <div class="col-md-10">
                        <select name="id_kelas" class="form-control" id="id_kelas" required >
              <option disable selected> Pilih Kelas</option>
              <?php include 'koneksi.php';
                $data = mysqli_query($koneksi,"SELECT kelas.id_kelas,kelas.nama_kelas,kelas.tingkat,kelas.id_jurusan,jurusan.nama_jurusan,jurusan.kaprog FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
                while ($d = mysqli_fetch_array($data)){
              ?>
              <option value="<?php echo $d['id_kelas'];?>">
                <?php echo $d['tingkat'];?>
                <?php echo $d['nama_kelas'];?>
              </option>
              <?php } ?>
                        </select>
                        </div>
                </div>
                <div class="form-group">
          <label class="col-md-2 control-label" for="nis">NIS</label>
            <div class="col-md-10">
              <input class="form-control" placeholder="Nomor Induk Siswa" type="number" name="nis" maxlength="10" required>
            </div>
                </div>
                <div class="form-group">
          <label class="col-md-2 control-label" for="nama">Nama Lengkap</label>
            <div class="col-md-10">
              <input class="form-control" placeholder="Nama Lengkap" type="text" name="nama" required>
            </div>
        </div>
          <div class="form-group">
          <label class="col-md-2 control-label" for="jk">Jenis Kelamin</label>
          <div class="col-md-10">
                    <select name="jk" class="form-control" id="jk" required>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
          <label class="col-md-2 control-label" for="tgl_lahir">Tanggal Lahir</label>
            <div class="col-md-10">
                        <!-- <div class="bfh-datepicker" data-format="y-m-d" data-date="today" name="tgl_lahir" required> -->
            <input class="form-control bfh-datepicker" placeholder="Tanggal Lahir" type="date" name="tgl_lahir" required>
            </div>
        </div>
                <div class="form-group">
          <label class="col-md-2 control-label" for="alamat">Alamat</label>
            <div class="col-md-10">
                        <textarea class="form-control" placeholder="Alamat Lengkap" rows="4" name="alamat" required></textarea>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label" for="foto">Upload Foto</label>
            <div class="col-md-10">
              <input class="form-control" type="file" name="foto"/>
            </div>
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
