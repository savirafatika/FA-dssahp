<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include"../../../lib/config.php";
	include"../../../lib/koneksi.php";
	$idKriteria = $_GET['id_kriteria'];
	$queryHapus = mysqli_query($con,"DELETE FROM kriteria WHERE id_kriteria='$idKriteria'");

	if ($queryHapus) {
		echo "<script> alert ('Data kriteria berhasil Dihapus'); window.location='$admin_url'+'adminweb.php?module=kriteria';</script> ";
	} else {
		echo "<script> alert ('Data kriteria gagal dihapus'); window.location='$admin_url'+'adminweb.php?module=edit_kriteria';</script> ";
	}
}
?>