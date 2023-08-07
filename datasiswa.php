<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<?php include "dataTables.php"; ?>
	<title>Data Siswa</title>
</head>
<body>
	
	<?php include "menu.php"; ?>
	<!--tombol tambah data siswa -->
	<!--isi -->
	<div class="container-fluid">
		<div>
			<a href="tambah.php"> <button class="btn btn-primary">Tambah Data Siswa</button> </a>
		</div>
		<h3>Data Siswa</h3>
		<table id="tabel-data">
		<thead>
				<tr style="background-color: grey; color: white;">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="width: 200px; text-align: center">Nomor Kartu</th>
					<th style="width: 400px; text-align: center">Nama</th>
					<th style="width: 400px; text-align: center">NIS</th>
					<th style="width: 400px; text-align: center">Kelas</th>
					<th style="text-align: center">Alamat</th>
					<th style="width: 100px; text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
					//koneksi ke database
					include "koneksi.php";

					//baca data siswa
					$sql = mysqli_query($konek, "select * from siswa");
					$no = 1;
					while($data = mysqli_fetch_array($sql))
					{
				?>

				<tr>
					<td> <?php echo $no++; ?> </td>
					<td> <?php echo $data['nomorkartu']; ?> </td>
					<td> <?php echo $data['nama']; ?> </td>
					<td> <?php echo $data['nis']; ?> </td>
					<td> <?php echo $data['kelas']; ?> </td>
					<td> <?php echo $data['alamat']; ?> </td>
					<td>
						<a href="edit.php?id=<?php echo $data['id']; ?>"> Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>"> Hapus</a>

					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php include "footer.php"; ?>
</body>
</html>
