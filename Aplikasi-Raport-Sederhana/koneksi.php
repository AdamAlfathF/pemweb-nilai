<?php

//koneksi ke databse
$servername= "localhost";
$username = "root";
$password = "";
$dbname = "raport";

$conn = new mysqli($servername, $username, $password,$dbname);

//Cek koneksi
if ($conn->connect_error){
  die("connection failed:".$conn->connect_error);
}
?>