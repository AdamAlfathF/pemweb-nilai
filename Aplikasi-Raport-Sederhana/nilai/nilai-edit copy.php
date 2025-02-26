<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
	}
 
	?>



<?php 
include_once("../functions.php");
$title = 'nilai';

$nis = $_GET['nis'];

$kd_mp = $_GET['kd_mp'];

$query = "SELECT siswa.nis, nilai.kd_mp, nama_mp, siswa.nama, nilai  FROM nilai, siswa, mata_pelajaran 
        WHERE siswa.nis = nilai.nis 
        AND nilai.kd_mp = mata_pelajaran.kd_mp 
		AND nilai.nis= '$nis' AND nilai.kd_mp= '$kd_mp'";

$ubah =  ambilsatubaris($con, $query);

if(isset($_POST['btn-ubah'])){
        
        $nilai  = $_POST['nilai'];
       
       if ($_POST['nilai'] >= 88 && $_POST['nilai'] <= 100) {
       $predikat = 'A';
       } else if ($_POST['nilai'] >= 77 && $_POST['nilai'] <= 87) {
        $predikat = 'B';
       } else if ($_POST['nilai'] >= 60 && $_POST['nilai'] <= 76) {
       $predikat = 'C';
       }
       else {
       $predikat = 'D';
       }
       
  $query = "UPDATE nilai SET nilai='$nilai', predikat='$predikat' WHERE nis='$nis' AND kd_mp='$kd_mp'";

    $execute = bisa($con,$query);
     if($execute == 1){
        header('location: nilai copy.php');
     }else{
         echo "Gagal Tambah Data";
     }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mata Kuliah</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

      <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
<!-- sidebar -->
       <?php include_once("../layout/sidebar copy.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <!-- top bar -->
            <?php include_once("../layout/topbar copy.php") ?>
              

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Nilai</h1>

                    <!-- data table siswa -->
                      <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Basis Data Siswa</h6> -->
                            <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                    <form method="post" action="">
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama" id="" class="form-control" value="<?= $ubah['nama'] ?>" readonly>
                    </div>
                   <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="text" name="kd_mp" id="" class="form-control" value="<?= $ubah['nama_mp'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" name="nilai" class="form-control" value="<?= $ubah['nilai']?>">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btn-ubah" class="btn btn-primary tambah">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once("../layout/footer copy.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    
    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>