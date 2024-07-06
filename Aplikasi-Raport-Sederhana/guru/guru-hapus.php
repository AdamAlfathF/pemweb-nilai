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