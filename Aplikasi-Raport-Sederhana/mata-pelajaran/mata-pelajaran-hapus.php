<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=gagal");
}

include_once("../functions.php");

$con = dbConnect();

$kd_mp = $_GET['kd_mp'];

// Hapus data dari tabel nilai yang memiliki foreign key terkait
$query_nilai = "DELETE FROM nilai WHERE kd_mp = '$kd_mp'";
$execute_nilai = bisa($con, $query_nilai);

// Hapus data dari tabel guru yang memiliki foreign key terkait
$query_guru = "DELETE FROM guru WHERE kd_mp = '$kd_mp'";
$execute_guru = bisa($con, $query_guru);

// Hapus data dari tabel mata_pelajaran setelah menghapus data terkait di tabel nilai dan guru
$query_mata_pelajaran = "DELETE FROM mata_pelajaran WHERE kd_mp = '$kd_mp'";
$execute_mata_pelajaran = bisa($con, $query_mata_pelajaran);

if ($execute_mata_pelajaran == 1) {
    header('location: mata-pelajaran.php');
} else {
    echo "Gagal menghapus data";
}
?>
