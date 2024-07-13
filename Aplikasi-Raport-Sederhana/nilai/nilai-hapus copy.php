<?php
include_once("../functions.php");

$nis = $_GET['nis'];
$kd_mp = $_GET['kd_mp'];

$execute = bisa($con, "DELETE FROM nilai WHERE nis='$nis' AND kd_mp='$kd_mp'");

if($execute == 1){
    header('location: nilai.php');
}
else
echo "Gagal menghapus data";
?>

