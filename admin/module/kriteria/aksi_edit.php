<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idKriteria = $_POST['id_kriteria'];
	$Kriteria = $_POST['Kriteria'];
	$Nilai = $_POST['Nilai'];
	$queryEdit = mysqli_query($con,"UPDATE kriteria SET kriteria='$Kriteria', nilai='$Nilai' WHERE id_kriteria='$idKriteria'");

	if ($queryEdit) {
		echo "<script> alert ('Data kriteria berhasil masuk'); window.location='$admin_url'+'adminweb.php?module=kriteria';</script> ";
	} else {
		echo "<script> alert ('Data kriteria gagal dimasukan'); window.location='$admin_url'+'adminweb.php?module=edit_kriteria';</script> ";
	}
}
?>