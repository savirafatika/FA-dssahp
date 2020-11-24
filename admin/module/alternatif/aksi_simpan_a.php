<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$Nim = $_POST['Nim'];
	$Nama = $_POST['Nama'];
	$Ntm = $_POST['Ntm'];
	$Ntw = $_POST['Ntw'];
	$Nta = $_POST['Nta'];
	// =========================================================================
	$ttl = 0;
	if ($Ntm == "Kompeten") {
		$ttl = round(0.73 * 0.64, 3);
	} else if ($Ntm == "Kurang Kompeten") {
		$ttl = round(0.19 * 0.64, 3);
	} else if ($Ntm == "Tidak Kompeten") {
		$ttl = round(0.08 * 0.64, 3);
	}
	$ttl2 = 0;
	if ($Ntw == "Baik") {
		$ttl2 = round(0.73 * 0.25, 3);
	} else if ($Ntw == "Cukup") {
		$ttl2 = round(0.19 * 0.25, 3);
	} else if ($Ntw == "Kurang") {
		$ttl2 = round(0.08 * 0.25, 3);
	}
	$ttl3 = 0;
	if ($Nta == "Tinggi") {
		$ttl3 = round(0.73 * 0.1, 3);
	} else if ($Nta == "Sedang") {
		$ttl3 = round(0.19 * 0.1, 3);
	} else if ($Nta == "Rendah") {
		$ttl3 = round(0.08 * 0.1, 3);
	}
	$Jml = round($ttl + $ttl2 + $ttl3, 3);
}
	// =========================================================================
	$querySimpan = mysqli_query($con,"INSERT INTO alternatif (nim, nama, ntm, ntw, nta, total) VALUES ('$Nim', '$Nama', '$Ntm', '$Ntw', '$Nta', '$Jml')");

	if ($querySimpan) {
		echo "<script> alert ('Data alternatif berhasil masuk'); window.location ='$admin_url'+'adminweb.php?module=n_alternatif';</script> ";
	} else {
		echo "<script> alert ('Data alternatif gagal dimasukan'); window.location ='$admin_url'+'adminweb.php?module=tambah_a';</script> ";
	}
?>