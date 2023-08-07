<!-- proses penyimpanan -->
<?php
session_start();

?>
<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$id = $_GET['id'];

	//baca data siswa berdasarkan id
	$cari = mysqli_query($konek, "select * from siswa where id='$id'");
	$hasil = mysqli_fetch_array($cari);


	//jika tombol simpan klik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nomorkartu = $_POST['nomorkartu'];
		$nama		= $_POST['nama'];
		$nis		= $_POST['nis'];
		$kelas		= $_POST['kelas'];
		$alamat		= $_POST['alamat'];

		//simpan ke tabel siswa
		$simpan = mysqli_query($konek, "update siswa set nomorkartu='$nomorkartu', nama='$nama', nis='$nis', kelas='$kelas', alamat='$alamat' where id='$id'");
		//jika berhasil disimpan, tampilkan pesan Tersimpan,
		//kembali ke data siswa
		if($simpan)
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('datasiswa.php');
				</script>	
			";
		}
		else
		{
			echo "
				<script>
					alert(' Gagal Tersimpan');
					location.replace('datasiswa.php');
				</script>	
			";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Edit Data Siswa</title>
	<script>
        // socket = new WebSocket("ws://192.168.1.150:8080");
        // socket.onopen = function(e) {  console.log("[socket] socket.onopen "); };
        // socket.onerror = function(e) {  console.log("[socket] socket.onerror "); };
        socket.onmessage = function(e) {  
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
		<h3>Edit Data Siswa</h3>

		<!-- form input -->
		<form method="POST">
			<div class="form-group">
				<label>Nomor Kartu</label>
				<Input type="text" name="nomorkartu" id="nomorkartu" placeholder="nomor kartu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nomorkartu']; ?>">
			</div>
			<div class="form-group">
				<label>Nama Siswa</label>
				<Input type="text" name="nama" id="nama" placeholder="nama siswa" class="form-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">
			</div>
			<div class="form-group">
				<label>NIS</label>
				<Input type="text" name="nis" id="nis" placeholder="nis" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<select class="form-control" name="kelas" style="width: 400px">
					<option>Pilih</option>
					<option value="X 1">X 1</option>
					<option value="X 2">X 2</option>
					<option value="X 3">X 3</option>
					<option value="X 4">X 4</option>
					<option value="X 5">X 5</option>
					<option value="X 6">X 6</option>
					<option value="X 7">X 7</option>
					<option value="X 8">X 8</option>
					<option value="X 9">X 9</option>
					<option value="X 10">X 10</option>
					<option value="X 11">X 11</option>
					<option value="X 12">X 12</option>
					<option value="XI 1">XI 1</option>
					<option value="XI 2">XI 2</option>
					<option value="XI 3">XI 3</option>
					<option value="XI 4">XI 4</option>
					<option value="XI 5">XI 5</option>
					<option value="XI 6">XI 6</option>
					<option value="XI 7">XI 7</option>
					<option value="XI 8">XI 8</option>
					<option value="XI 9">XI 9</option>
					<option value="XI 10">XI 10</option>
					<option value="XI 11">XI 11</option>
					<option value="XI 12">XI 12</option>
					<option value="XII MIPA 1">XII MIPA 1</option>
					<option value="XII MIPA 2">XII MIPA 2</option>
					<option value="XII MIPA 3">XII MIPA 3</option>
					<option value="XII MIPA 4">XII MIPA 4</option>
					<option value="XII MIPA 5">XII MIPA 5</option>
					<option value="XII MIPA 6">XII MIPA 6</option>
					<option value="XII MIPA 7">XII MIPA 7</option>
					<option value="XII IPS 1">XII IPS 1 </option>
					<option value="XII IPS 2">XII IPS 2</option>
					<option value="XII IPS 3">XII IPS 3</option>
					<option value="XII IPS 4">XII IPS 4</option>
					<option value="XII IPS 5">XII IPS 5</option>
				</select>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat" style="width: 400px"><?php echo $hasil['alamat']; ?></textarea>
			</div>

			<button class="btn btn-prymary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>