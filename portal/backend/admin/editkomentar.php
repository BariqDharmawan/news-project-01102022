<?php session_start(); ?>
<?php
  error_reporting(0);
?>
<?php 
include 'koneksi.php';

$no = mysqli_query($koneksi, "select id from tambah_post order by id desc ");

$kode_post = mysqli_fetch_array($no);
$kode = $kode_post['id'];

$susun = substr($kode, 3, 5);
$plus = (int) $susun + 1;

if(strlen($plus) == 1){

$tambah = "B-"."0".$plus;

}

elseif (strlen($plus) == 2) {
$tambah = "B-"."0".$plus;
}

else{

$tambah = "B-".$plus;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>

<div class="wrapper">

  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-News</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Halo ! <b><?php echo $_SESSION['username']; ?></b></a>
        </div>
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tableberita.php">Table Post</a></li>
              <li class="breadcrumb-item active">Tambah Berita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Postingan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <?php
                    include 'koneksi.php';
                    $id = $_GET['id'];
                    $posting = mysqli_query($koneksi,"select * from tambah_post where id='$id'");
                    while($p = mysqli_fetch_array($posting)){
                      ?>
            <form class="forms-sample" action="edit_berita.php" method="POST">
              <div class="form-group">
                <label for="inputName">ID Berita</label>
                <input class="form-control" type="text" name="id" value="<?php echo $id;?>" readonly required="required">
              </div>
              <div class="form-group">
                <label for="inputDescription">Judul Berita</label>
                <input class="form-control" id="judul" placeholder="Masukan Nama User" type="text" name="judul" required value="<?php echo $p['judul']; ?>">
              </div>
              <div class="form-group">
                <label for="inputDescription">Tanggal Post</label>
                <input class="form-control" id="tgl_post" placeholder="Masukan Nama User" type="date" name="tgl_post" required value="<?php echo $p['tgl_post']; ?>">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Isi Post</label>
                <textarea id="inputDescription" class="form-control" id="isi" placeholder="Isi keterangan post.." name="isi" required rows="4" value="<?php echo $p['isi']; ?>"></textarea>
                <!-- <input class="form-control" type="textarea" id="isipost" placeholder="Masukan Alamat User" name="isipost" required> -->
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Penulis</label>
                <input class="form-control" type="text" name="penulis" value="<?php echo $_SESSION['username'];?>" readonly required="required">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Gambar Post</label>
                <input class="form-control" id="gambar" type="file" name="gambar" required value="<?php echo $p['gambar']; ?>">
              </div>
              <?php 
                }
                ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="tablekomentar.php" class="btn btn-secondary">Batalkan</a>
          <button type="submit" class="btn btn-success mr-2">Tambah</button>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">E-News</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App
<script src="../dist/js/adminlte.js"></script> -->
<!-- AdminLTE for demo purposes
<script src="../dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="../dist/js/pages/dashboard.js"></script> -->
</body>
</html>
