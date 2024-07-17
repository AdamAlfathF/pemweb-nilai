<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
	}
 
	?>



<?php
include_once("../functions.php");

$nip = $_GET['nip'];

$query = "DELETE FROM guru WHERE nip='$nip'";

$execute = bisa($con, $query);

if($execute == 1){
    header('location: guru.php');
}
else
echo "Gagal menghapus data";
?>