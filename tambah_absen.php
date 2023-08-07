<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//jika tombol simpan klik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nomorkartu = $_POST['nomorkartu'];
		$nama		= $_POST['nama'];
		$nis		= $_POST['nis'];
		$kelas		= $_POST['kelas'];
		$keterangan		= $_POST['alasan'];

		$cekdata = mysqli_query($konek,"SELECT nomorkartu FROM siswa WHERE nomorkartu = '$nomorkartu'");

		//simpan ke tabel siswa
		if (mysqli_num_rows($cekdata) > 0) {
			echo "
				<script>
					alert(' Gagal Tersimpan, Nomer kartu sudah di gunakan');
					location.replace('datasiswa.php');
				</script>	
			";
		}else {
			# code...
			$simpan = mysqli_query($konek, "insert into absensi(id,nomorkartu, tanggal, keterangan)values('$nomorkartu','$kelas','$keterangan')");
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datasiswa.php');
				</script>	
			";
		}
			
	}

	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Siswa</title>

	<!-- pembacaan no kartu otomatis-->
	<script>
        // socket = new WebSocket("ws://192.168.1.150:8080");
        // socket.onopen = function(e) {  console.log("[socket] socket.onopen "); };
        // socket.onerror = function(e) {  console.log("[socket] socket.onerror "); };
        socket.onmessage = function(e) {  
            // console.log(e.data);
			const obj = JSON.parse(e.data);
			console.log(obj.tagId);
			if(obj.tagId != "" && obj.tagId != undefined){
				document.getElementById("nomorkartu").value = obj.tagId;
			}
        };
      </script>
	
</head>
<body>
	
	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Absen Siswa</h3>

		<!-- form input -->
		<form method="POST">
			<div class="form-group">
				<label>Nomor Kartu</label>
				<Input type="text" name="nomorkartu" id="nomorkartu" placeholder="tempelkan kartu anda" class="form-control" style="width: 200px" required>
			</div>

			<div class="form-group">
				<label>Nama</label>
				<Input type="date" name="tanggal" id="nama" placeholder="nama siswa" class="form-control" style="width: 400px" required>
			</div>
			<div class="form-group">
				<label>Keterangan Hadir</label>
				<select class="form-control" name="keterangan" style="width: 400px" required>
					<option>Pilih</option>
					<option value="izin">Izin</option>
					<option value="sakit">Sakit</option>
				</select>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>