<?php 
	include "koneksi.php";
	// ini_set('display_errors', 0);
	//baca tabel ststus untuk mode absensi
	$sql = mysqli_query($konek, "select * from status");
	$data = mysqli_fetch_array($sql);
	$mode_absen = $data ['mode'];

	//uji mode absen
	$mode = "";
	if($mode_absen==1)
		$mode = "Masuk";
	else if($mode_absen==2)
		$mode = "Pulang";

	// get data jam masuk and jam keluar
	$sqltime 		= mysqli_query($konek, "select * from configdate");
	$datatime 	= mysqli_fetch_array($sqltime);
	$jammasuk 	= $datatime ['jammasuk'];
	$jamkeluar 	= $datatime ['jamkeluar'];

?>


	<?php
		$nomorkartu = isset($_POST['tagId']) ? $_POST['tagId'] : "";
 
		if($nomorkartu=="") { 
	?>

	<h3>Absen : <?php echo $mode; ?> </h3>
	<h3>Silahkan Tempelkan Kartu Anda</h3>
	<img src="images/rfid.png" style="width: 200px"> <br>
	<img src="images/animasi2.gif">

	<?php } else {
		//cek nomor kartu rfid tersebut apakah terdaftar di tabel siswa
		$cari_siswa = mysqli_query($konek, "select * from siswa where nomorkartu='$nomorkartu'");
		$jumlah_data = mysqli_num_rows($cari_siswa);
		
		if($jumlah_data==0){
			echo $mode;
			// echo "<h1>Maaf Kartu Tidak Dikenali</h1>";
		}
		else
		{
			//ambil nama siswa
			$data_siswa = mysqli_fetch_array($cari_siswa);
			$nama =$data_siswa['nama'];

			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d');
			$jam 	 = date('H:i:s');

			//cek ditabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada maka update data sesuai mode absensi 
			$cari_absen = mysqli_query($konek, "select * from absensi where nomorkartu='$nomorkartu' and tanggal='$tanggal'");
			//hitung jumlah data
			$jumlah_absen = mysqli_num_rows($cari_absen);
			if($jumlah_absen == 0)
			{
				echo "$mode::$nama <br/>";
				// echo "<h1>Selamat Datang <br> $nama</h1> ";

				// keterangan
				$terlambat = 0;
				if ($jam > $jammasuk) {
					$terlambat = 1;
					echo "Anda telah terlambat <br/>";
				}
				mysqli_query($konek, "insert into absensi(nomorkartu, tanggal, jam_masuk, terlambat, keterangan)values('$nomorkartu', '$tanggal', '$jam', '$terlambat', 'HADIR')");
			}
			else
			{
				//update sesuai pilihan mode absen 
				if($mode_absen == 2)
				{

					$data_absen = mysqli_fetch_array($cari_absen);
					if($data_absen['jam_pulang'] == '' || $data_absen['jam_pulang'] == null || $data_absen['jam_pulang'] == '00:00:00'){
						echo "$mode::$nama <br/>";
						// echo "<h1> Selamat Jalan <br> $nama</h1>";

						//keterangan
						$pulanglebihawal = 0;
						if ($jam < $jamkeluar) {
							$pulanglebihawal = 1;
							echo "Anda telah pulang lebih awal <br/>";
						}

						mysqli_query($konek, "update absensi set jam_pulang='$jam', pulanglebihawal='$pulanglebihawal' where nomorkartu='$nomorkartu' and tanggal='$tanggal'");
					}else{
						echo "Anda Sudah Absen Pulang";	
					}
					
				}else{
					echo "Anda Sudah Absen Masuk";
				}
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "delete from tmprfid");
	} ?>
