<?php

include_once("../functions.php");
$title = 'nilai';

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];


$query = "SELECT siswa.nis, siswa.nama FROM siswa WHERE nis='$nis'";

$tampil = ambilsatubaris($con, $query);
}
?>
<!DOCTYPE html>
<html><head><title>Nilai Siswa</title>

<!-- Custom fonts for this template-->
<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">



  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">
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
                    <h1 class="h3 mb-4 text-gray-800">Nilai Siswa</h1>

                    <div class="row mb-3 ">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-2">
                    <input type="text" class="form-control" value="<?= $tampil['nis']  ?>" readonly>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= $tampil['nama'] ?>" readonly>
                    </div>
                    </div>

                    <!-- data table siswa -->
                      <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Basis Data Siswa</h6> -->
                            <a href="javascript:void(0)" onclick="window.history.back();" ><button type="button" class="btn btn-outline-primary rounded">Kembali</button></a>
                        </div>
                        <div class="card-body">
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT siswa.nis, nilai.kd_mp, nama_mp, nama_guru, semester,nilai, predikat FROM nilai, mata_pelajaran, siswa, guru
                            WHERE nilai.kd_mp = mata_pelajaran.kd_mp
                            AND mata_pelajaran.kd_mp = guru.kd_mp
                            AND siswa.nis = $nis AND  nilai.nis = $nis";
	$res=$db->query($sql);
	if($res){
		?>
        <div class="table-responsive">
             <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
		<tr><th>Mata Pelajaran</th>
            <th>Guru</th>
            <th>Semester</th>
            <th>Nilai</th>
            <th>Predikat</th>
            <th>Aksi</th>
			</tr></thead>
		<tbody>
		 <?php
            $data = $res->fetch_all(MYSQLI_ASSOC);
            foreach($data as $row){
            ?>
            <tr>
                <td><?= $row['nama_mp']; ?></td>
                <td><?= $row['nama_guru'] ?></td>
                <td><?= $row['semester']?></td>
                <td><?= $row['nilai']; ?></td>
                <td><?= $row['predikat']; ?></td>
                <td>
                    <a href="nilai-edit.php?nis=<?= $row['nis'];?>&kd_mp=<?=$row['kd_mp'];?>" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                    </a>
                    <a href="nilai-hapus.php?nis=<?= $row['nis'];?>&kd_mp=<?=$row['kd_mp'];?>" class="btn btn-danger btn-circle btn-sm hapus">
                    <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
                <?php
        }
        ?>
		</tbody>
		</table>
		<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
      </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once("../layout/footer.php") ?>
            <!-- End of Footer -->

        </div>
        </div>
        <!-- End of Content Wrapper -->

<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <script src="../assets/js/script.js"></script>

<script>
$(document).ready(function () {
    $('#dataTable').DataTable({
        language : {
            url : 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json'
        },
		dom: 'Bfrtip',
        buttons: [
             'pdf', 'print'
        ]
	});
});
</script>

</body>
</html>