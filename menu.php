<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">ABSENSI</a>
		</div>
		<ul class="nav navbar-nav">
			<li> <a href="index.php"> HOME </a></li>
			<?php if($_SESSION['role'] == 1) {?>
			<li> <a href="datasiswa.php"> Data Siswa </a></li>
			<?php }?>
			<li> <a href="absensi.php"> Rekapitulasi Absensi </a></li>
			<li> <a href="scan.php"> Scan Kartu </a></li>
			<li> <a href="logout.php"> Logout </a></li>
		</ul>
	</div>
</nav>
