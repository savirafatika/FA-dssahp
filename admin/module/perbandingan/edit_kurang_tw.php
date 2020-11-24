<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
    
	$B = $_POST['Baik'];
	$C = $_POST['Cukup'];
	$K = $_POST['Kurang'];
	$queryEdit = mysqli_query($con,"UPDATE pb_tw SET baik='$B', cukup='$C', kurang='$K' WHERE id_pbtw=3");

	$sql1 = mysqli_query($con, "SELECT baik, cukup, kurang, SUM(baik) AS B, SUM(cukup) AS C, SUM(kurang) AS K FROM pb_tw");
	$q = mysqli_fetch_array($sql1);
	$a = $q['B'];
	$b = $q['C'];
	$c = $q['K'];

	$query = mysqli_query($con, "SELECT * FROM pb_tw WHERE id_pbtw=3");
	$kat = mysqli_fetch_array($query);
	$baik = round($kat['baik'] / $a, 2);
	$ckp = round($kat['cukup'] / $b, 2);
	$krg = round($kat['kurang'] / $c, 2);
	$jml = round($baik + $ckp + $krg, 2);
	$prioritas = round($jml / 3, 2);

	if ($queryEdit) {
		mysqli_query($con, "UPDATE jml SET jumlah = '$a' WHERE id_j = 'baik'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$b' WHERE id_j = 'ckp'");
		mysqli_query($con, "UPDATE jml SET jumlah = '$c' WHERE id_j = 'krg'");
		mysqli_query($con, "UPDATE s_tw SET b = '$baik', c = '$ckp', k = '$krg', j = '$jml', p = '$prioritas' WHERE id_stw = 3");
		echo "<script> alert ('Data berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	} else {
		echo "<script> alert ('Data gagal diubah'); window.location='$admin_url'+'adminweb.php?module=perbandingan';</script> ";
	}
}
?>