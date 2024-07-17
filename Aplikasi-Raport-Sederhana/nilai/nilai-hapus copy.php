<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
	}
 
	?>



<?php
include_once("../functions.php");

$nis = $_GET['nis'];
$kd_mp = $_GET['kd_mp'];

$execute = bisa($con, "DELETE FROM nilai WHERE nis='$nis' AND kd_mp='$kd_mp'");

if($execute == 1){
    header('location: nilai copy.php');
}
else
echo "Gagal menghapus data";
?>

