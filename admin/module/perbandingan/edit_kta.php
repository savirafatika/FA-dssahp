<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
    
	$Tm = $_POST['Tm'];
	$Tw = $_POST['Tw'];
	$Ta = $_POST['Ta'];
	$queryEdit = mysqli_query($con,"UPDATE pb_kriteria SET tm='$Tm', tw='$Tw', ta='$Ta' WHERE id_pbk=3");

	$sql1 = mysqli_query($con, "SELECT tm, tw, ta, SUM(tm) AS JTM, SUM(tw) AS JTW, SUM(ta) AS JTA FROM pb_kriteria");
	$q = mysqli_fetch_array($sql1);
	$a = $q['JTM'];
	$b = $q['JTW'];
	$c = $q['JTA'];

	$query = mysqli_query($con, "SELECT * FROM pb_kriteria WHERE id_pbk=3");
	$kat = mysqli_fetch_array($query);
	$jtm = round($kat['tm'] / $a, 2);
	$jtw = round($kat['tw'] / $b, 2);
	$jta = round($kat['ta'] / $c, 2);
	$jml = round($jtm + $jtw + $jta, 2);
	$prioritas = round($jml / 3, 2);

	if ($queryEdit) {
		mysqli_query($con, "UPDATE jml SET jumlah = '$a' WHERE id_j = 'tm'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$b' WHERE id_j = 'tw'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$c' WHERE id_j = 'ta'");
		mysqli_query($con, "UPDATE s_kr SET tm = '$jtm', tw = '$jtw', ta = '$jta', j = '$jml', p = '$prioritas' WHERE id_s = 3");
		echo "<script> alert ('Data berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	} else {
		echo "<script> alert ('Data gagal diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	}
}
?>