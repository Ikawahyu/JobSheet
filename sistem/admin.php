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

  <title>Dashboard</title>

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
        <!--<a href="admin_siswa.php" class="list-group-item list-group-item-action bg-light"></a>-->
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
            
            
             <li class="nav-item">
              <a class="nav-link" href="tambah_siswa.php">Tambah Data Siswa</a>
            </li>
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
<div class="col-md-10" >
        <div class="row" >
            <div class="col-md-14">
            <div class="content-box-large">
          <div class="panel-heading">
               
                
              <a href=export.php class="btn btn-success"> Export Data To Excel </a>
                <form class="form-group" method="post" enctype="multipart/form-data" action="aksi/aksi_import.php">
                Pilih File: 
                <input name="filepegawai" type="file" required="required"> 
                <input name="upload" type="submit" value="Import" class="btn btn-success"></form>

                <br>
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">

              <br>

                        <tr >
                            <th class="table-primary" style="text-align: center;">No</th>
                           <!--  <th>ID Siswa</th>  -->
                            <th class="table-primary" style="text-align: center;">Kelas</th>
                            <th class="table-primary" style="text-align: center;">Jurusan</th>
                            <th class="table-primary" style="text-align: center;">NIS</th>
                            <th class="table-primary" style="text-align: center;">Nama</th>
                            <th class="table-primary" style="text-align: center;">Jenis Kelamin</th>
                            <th class="table-primary" style="text-align: center;">TTL</th> 
                            <th class="table-primary" style="text-align: center;">Alamat</th>
                            <th class="table-primary" style="text-align: center;">Foto</th>
                            <th class="table-primary" style="text-align: center;">Action</tr>
                        </tr>
                            <?php
                            include 'koneksi.php';
                       
                            $no=1;
                                 
                            $sql = "SELECT siswa.id_siswa,siswa.nis,siswa.nama,siswa.jk,siswa.tgl_lahir,siswa.alamat,siswa.foto,siswa.id_kelas,kelas.nama_kelas,kelas.tingkat,kelas.id_jurusan,jurusan.nama_jurusan,jurusan.kaprog FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan";
                            $query = mysqli_query($koneksi,$sql);
                            if (!$query){
                                die ('SQL Error : '.mysqli_error($koneksi));
                            }
                            while ($row = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $no++;?> </td>
                          <!--       <td><?php echo $row['id_siswa'];?></td> -->
                                <td><?php echo $row['tingkat'];?></td>
                                <td><?php echo $row['nama_jurusan'];?></td>
                                <td><?php echo $row['nis'];?></td>
                                <td><?php echo $row['nama'];?></td>
                                <td><?php echo $row['jk'];?></td>
                                <td><?php echo $row['tgl_lahir'];?></td>
                                <td><?php echo $row['alamat'];?></td>
                                <td> <img src="<?php echo "images/".$row['foto'];?>" width="100px"></td>
                                <td>
                                    <a href=ubah_siswa.php?id_siswa=<?php echo $row['id_siswa'];?>" class="btn btn-success">Ubah</a>
                                    <a href=cetak_siswa.php?id_siswa=<?php echo $row['id_siswa'];?>" class="btn btn-primary">Cetak</a>
                                    <a href=delete_siswa.php?id_siswa=<?php echo $row['id_siswa'];?>" class="btn btn-danger">Hapus</a>
                                </td>        
                            </tr>
                    <?php }?>
                    </table>
                </div>
                </div>
            </div>
            </div>
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
