<?php 
include_once("../functions.php");
$title = 'guru';
$nip = $_GET['nip'];

$agama = ['ISLAM', 'PROTESTAN', 'KATHOLIK', 'HINDU', 'BUDHA', 'KONGHUCU', 'LAINNYA'];
$jenis = ['L', 'P'];

$query = "SELECT * FROM guru WHERE nip='$nip'";
$ubah = ambilsatubaris($con, $query);


if(isset($_POST['btn-ubah'])){
    $kd_mp    = $_POST['kd_mp'];
     $nama          = $_POST['nama_guru'];
     $alamat          = $_POST['alamat'];
     $jenis_kelamin = $_POST['jenis_kelamin'];
     $agama = $_POST['agama'];
     

    $query = "UPDATE guru SET kd_mp = '$kd_mp', nama_guru = '$nama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', agama = '$agama' WHERE nip = '$nip'";
     $execute = bisa($con,$query);
     if($execute == 1){
        header('location: guru.php');
     }else{
         echo "Gagal Ubah Data";
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

    <title>Guru</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Ubah Data Guru</h1>

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
                        <label>NIP</label>
                        <input type="text" name="nip" value="<?= $ubah['nip'];?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select name="kd_mp" class="form-control">
                        <?php
                            $datapelajaran=getListPelajaran();
                            foreach($datapelajaran as $data){
                                echo "<option value=\"".$data["kd_mp"]."\"";
                                if($data["kd_mp"]==$ubah["kd_mp"])
                                    echo " selected"; // default sesuai kategori sebelumnya
                                echo ">".$data["nama_mp"]."</option>";
                            }
                        ?>                      
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_guru" value="<?= $ubah['nama_guru'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"><?= $ubah['alamat'];?> </textarea>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <?php foreach ($jenis as $key) : ?>
                                <?php if ($key == $ubah['jenis_kelamin']) : ?>
                                    <option value="<?= $key ?>" selected><?= $key ?></option>
                                <?php else : ?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control">
                            <?php foreach ($agama as $key) : ?>
                                <?php if ($key == $ubah['agama']) : ?>
                                    <option value="<?= $key ?>" selected><?= $key ?></option>
                                <?php else : ?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="btn-ubah" id="ubah" class="btn btn-primary">Ubah</button>
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