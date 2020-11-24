<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
    
	$Kp = $_POST['Kp'];
	$Kr = $_POST['Kr'];
	$Tdk = $_POST['Tdk'];
	$queryEdit = mysqli_query($con,"UPDATE pb_tm SET kompeten='$Kp', kurang='$Kr', tidak='$Tdk' WHERE id_pbtm=3");

	$sql1 = mysqli_query($con, "SELECT kompeten, kurang, tidak, SUM(kompeten) AS kp, SUM(kurang) AS kr, SUM(tidak) AS tdk FROM pb_tm");
	$q = mysqli_fetch_array($sql1);
	$a = $q['kp'];
	$b = $q['kr'];
	$c = $q['tdk'];

	$query = mysqli_query($con, "SELECT * FROM pb_tm WHERE id_pbtm=3");
	$kat = mysqli_fetch_array($query);
	$Kom = round($kat['kompeten'] / $a, 2);
	$Kur = round($kat['kurang'] / $b, 2);
	$Tid = round($kat['tidak'] / $c, 2);
	$jml = round($Kom + $Kur + $Tid, 2);
	$prioritas = round($jml / 3, 2);

	if ($queryEdit) {
		mysqli_query($con, "UPDATE jml SET jumlah = '$a' WHERE id_j = 'kp'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$b' WHERE id_j = 'kr'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$c' WHERE id_j = 'tdk'");
		mysqli_query($con, "UPDATE s_tm SET kp = '$Kom', kr = '$Kur', tdk = '$Tid', j = '$jml', p = '$prioritas' WHERE id_stm = 3");
		echo "<script> alert ('Data berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	} else {
		echo "<script> alert ('Data gagal diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	}
}
?>