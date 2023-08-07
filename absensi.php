<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<?php include "dataTables.php"; ?>
	<title>Rekapitulasi Absensi</title>
</head>
<body>
	
	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<?php if($_SESSION['role'] == 1) {?>
			<div>
				<a href="insertabsensi.php"> <button class="btn btn-primary">Tambah Absen</button> </a>
				<a href="ubahjam.php"> <button class="btn btn-info">Ubah Jam Masuk/Pulang</button> </a>
			</div>
		<?php }?>
		<h3 class="mb-0">Rekap Absensi</h3>
		
		<table class="table table-bordered" id="rekap">
			<thead>
				<tr style="background-color: grey; color:white">
				<th style="width: 10px; text-align: center">No.</th>
				<th style="text-align: center">Nama</th>
				<th style="text-align: center">NIS</th>
				<th style="text-align: center">Kelas</th>
				<th style="text-align: center">Tanggal</th>
				<th style="text-align: center">Jam Masuk</th>
				<th style="text-align: center">Jam Pulang</th>
				<th style="text-align: center">Keterangan</th>
				<th style="text-align: center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
					include "koneksi.php";

					//baca tabel absensi dan relasikan dengan tabel siswa berdasarkan nomor kartu RFID untuk tanggal hari ini

					//baca tanggal saat ini 
					date_default_timezone_set('Asia/Jakarta');
					$tanggal = date('Y-m-d');

					//filter absensi berdasarkan tanggal saat ini 
					$sql = mysqli_query($konek, "select a.id, b.nama, b.nis, b.kelas, a.tanggal, a.jam_masuk, a.jam_pulang, a.keterangan, a.terlambat, a.pulanglebihawal from absensi a join siswa b on a.nomorkartu = b.nomorkartu order by a.tanggal desc");

					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;

				?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['nama']; ?> </td>
					<td> <?php echo $data['nis']; ?> </td>
					<td> <?php echo $data['kelas']; ?> </td>
					<td> <?php echo $data['tanggal']; ?> </td>
					<td> <?php 
						if ($data["keterangan"] !== "HADIR" && !$data['jam_masuk'])
							echo "X";
						else
							echo $data['jam_masuk'];
					?> </td>
					<td> <?php 
					if ($data["keterangan"] !== "HADIR" && !$data['jam_pulang'])
						echo "X";
					else
						echo $data['jam_pulang'];
					?> </td>
					<td> 
						<div style="display: flex;flex-wrap: nowrap;align-items: center; gap: 0.5rem;">
							<?php echo $data['keterangan']; ?> 
							
							<?php 
								if ($data["terlambat"] == 1) echo '<span class="label label-warning">Terlambat</span>';
								if ($data["terlambat"] == 1 && $data["pulanglebihawal"] == 1) echo " ";
								if ($data["pulanglebihawal"] == 1) echo '<span class="label label-warning">Pulang Lebih Awal</span>';
							?> 
						</div>
					</td>
					
					<td>
						<a href="edit.php?id=<?php echo $data['id']; ?>"> Edit</a>
						
					</td>
				</tr>
				<?php } ?>
			</tbody>	
		</table>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>