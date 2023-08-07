<?php
session_start();

 // cek apakau user sudah login
 if ($_SESSION['status'] != "login") {
  header('Location: index.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Menu Utama</title>
</head> 
<body>
	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid" style="padding-top: 5%; text-align: center">
		<h1>
			Selamat Datang <br>
			SISTEM ABSENSI SISWA <br>
			BERBASIS KARTU RFID
		</h1>
		<img src="images/logo.jfif">
	</div>

	<?php include "footer.php"; ?>

</body>
</html>