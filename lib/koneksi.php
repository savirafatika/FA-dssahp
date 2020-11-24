<?php
//definisikan koneksi ke database 
$server = "localhost";
$username = "root";
$password = "";
$database = "spk_ahp";

//koneksi dan memilih database di server
$con = mysqli_connect($server,$username,$password) or die ("koneksi gagal");
mysqli_select_db($con,$database) or die ("database tidak bisa dibuka");

if ($con) {
	echo"";
} else {
	echo"database tidak terhubung";
}
?>