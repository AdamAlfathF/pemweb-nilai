<?php
include_once("../functions.php");
$title = 'nilai';
if(isset($_POST["btn-simpan"])){
	if($con->connect_errno==0){
		// Bersihkan data
	  $nis    = $_POST['nis'];
        $kd_mp  = $_POST['kd_mp'];
        $semester = $_POST['semester'];
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
        
		// validasi
		$pesansalah="";

          $periksa = mysqli_query($con, "SELECT * FROM nilai WHERE nis='$nis' AND kd_mp='$kd_mp'");
       
        if($periksa -> num_rows > 0)
		$pesansalah.="Data nilai sudah ada.<br>";

		if($pesansalah==""){
			?>
			<div class="alert alert-primary" role="alert">
			Tidak terjadi kesalahan. Semua data valid. Data akan disimpan ke database
			</div>
		<?php
		// script database
		// Susun query insert
		$sql="INSERT INTO nilai VALUES ('$nis', '$kd_mp', '$semester', '$nilai', '$predikat')";
		// Eksekusi query insert
		$res=$con->query($sql);
		if($res){
			if($con->affected_rows>0){ // jika ada penambahan data
				?>
				<div class="alert alert-primary d-flex align-items-center" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
				<div>
				Data berhasil disimpan.
				</div>
				</div>
				<br>
				<?php
                header('location: nilai.php');
			}
		}
		else{
			?>
			Data gagal disimpan karena data nilai mungkin sudah ada.<br>
			<a href=javascript:history.back(); class="btn btn-primary">Kembali</a>
			<?php
		}
		}
		else{
		?>
            <div class="alert alert-danger" role="alert">
            <?= $pesansalah ?>
            </div>
            <?php
		}
        ?>
        <?php
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
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

    <title>Siswa</title>

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
       <?php include_once("../layout/sidebar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <!-- top bar -->
            <?php include_once("../layout/topbar.php") ?>
              

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Input Nilai</h1>

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
                        <label>Nama Siswa</label>
                        <select name="nis" class="form-control">
                        <?php
                                $datasiswa=getListSiswa();
                                foreach($datasiswa as $data){
                                    echo "<option value=\"".$data["nis"]."\">".$data["nama"]."</option>";
                                }
                            ?>                        
                        </select>
                    </div>
                   <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select name="kd_mp" class="form-control">
                        <?php
                                $datapelajaran=getListPelajaran();
                                foreach($datapelajaran as $data){
                                    echo "<option value=\"".$data["kd_mp"]."\">".$data["nama_mp"]."</option>";
                                }
                            ?>                        
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Semester</label>
                        <select name="semester" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" name="nilai" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btn-simpan" class="btn btn-primary tambah">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once("../layout/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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