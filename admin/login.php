<?php
include "../lib/koneksi.php";
$username = $_POST['username'];
$pass = $_POST['password'];
if (!ctype_alnum($username) OR !ctype_alnum($pass)) {
	echo '<script type="text/javascript"> alert("LOGIN GAGAL!, Username atau password anda tidak benar <br>
	atau account anda sedang diblokir."); window.location.href = "http://localhost/spk_ahp/admin/"; </script>';
} else {
	$login = mysqli_query($con,"SELECT * FROM admin WHERE username='$username' AND password='$pass'");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

	if ($ketemu > 0) {
		session_start();

		$_SESSION['namauser'] = $r['username'];
		$_SESSION['passuser'] = $r['password'];

		header('location:adminweb.php?module=home');
	} else {
		echo '<script type="text/javascript"> alert("LOGIN GAGAL!, Username atau password anda tidak benar atau account anda sedang diblokir."); window.location.href = "http://localhost/spk_ahp/admin/"; </script>';
	}
}
?>