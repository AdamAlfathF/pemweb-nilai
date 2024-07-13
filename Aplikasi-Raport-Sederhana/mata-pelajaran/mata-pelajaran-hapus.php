<?php
include_once("../functions.php");

$kd_mp = $_GET['kd_mp'];

$query = "DELETE FROM mata_pelajaran WHERE kd_mp = $kd_mp";

$execute = bisa($con, $query);

if($execute == 1){
    header('location: mata-pelajaran.php');
}
else
echo "Gagal menghapus data";
?>