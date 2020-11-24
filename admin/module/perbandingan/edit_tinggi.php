<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
    
	$T = $_POST['Tinggi'];
	$S = $_POST['Sedang'];
	$R = $_POST['Rendah'];
	$queryEdit = mysqli_query($con,"UPDATE pb_ta SET tinggi='$T', sedang='$S', rendah='$R' WHERE id_pbta=1");

	$sql1 = mysqli_query($con, "SELECT tinggi, sedang, rendah, SUM(tinggi) AS Ti, SUM(sedang) AS Se, SUM(rendah) AS Re FROM pb_ta");
	$q = mysqli_fetch_array($sql1);
	$a = $q['Ti'];
	$b = $q['Se'];
	$c = $q['Re'];

	$query = mysqli_query($con, "SELECT * FROM pb_ta WHERE id_pbta=1");
	$kat = mysqli_fetch_array($query);
	$ti = round($kat['tinggi'] / $a, 2);
	$se = round($kat['sedang'] / $b, 2);
	$re = round($kat['rendah'] / $c, 2);
	$jml = round($ti + $se + $re, 2);
	$prioritas = round($jml / 3, 2);

	if ($queryEdit) {
		mysqli_query($con, "UPDATE jml SET jumlah = '$a' WHERE id_j = 'ti'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$b' WHERE id_j = 'se'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$c' WHERE id_j = 're'");
		mysqli_query($con, "UPDATE s_ta SET ti = '$ti', se = '$se', re = '$re', j = '$jml', p = '$prioritas' WHERE id_sta = 1");
		echo "<script> alert ('Data berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	} else {
		echo "<script> alert ('Data gagal diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	}
}
?>