<?php
include_once("../functions.php");



$nis = $_GET['nis'];

$query = "DELETE FROM siswa WHERE nis='$nis'";

$execute = bisa($con, $query);

if($execute == 1){
    header('location: siswa.php');
}
else
echo "Gagal menghapus data";
?>