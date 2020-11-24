<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include"../../../lib/config.php";
	include"../../../lib/koneksi.php";
	$idA = $_GET['id_a'];
	$queryHapus = mysqli_query($con,"DELETE FROM alternatif WHERE id_a='$idA'");

	if ($queryHapus) {
		echo "<script> alert ('Data alternatif berhasil Dihapus'); window.location='$admin_url'+'adminweb.php?module=n_alternatif';</script> ";
	} else {
		echo "<script> alert ('Data alternatif gagal dihapus'); window.location='$admin_url'+'adminweb.php?module=n_alternatif';</script> ";
	}
}
?>