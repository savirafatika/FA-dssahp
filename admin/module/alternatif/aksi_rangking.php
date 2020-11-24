<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $Id_a = $_POST['Id_a'];
    $Nama = $_POST['Nama'];
    $Total = $_POST['Total'];
	$queryEdit = mysqli_query($con,"UPDATE alternatif SET nama = '$Nama', total='$Total' WHERE id_a='$Id_a'");

	if ($queryEdit) {
		echo "<script> alert ('Data alternatif berhasil dirangking'); window.location='$admin_url'+'adminweb.php?module=n_alternatif';</script> ";
	} else {
		echo "<script> alert ('Data alternatif gagal dirangking'); window.location='$admin_url'+'adminweb.php?module=n_alternatif';</script> ";
	}
}
?>