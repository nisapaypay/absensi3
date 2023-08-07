<?php
session_start();
include "koneksi.php";

if (!$_SESSION['role'] == 1) {
  header('Location: index.php');
}

if (isset($_POST["submit"])) {
  $nomorkartu    = $_POST["nokartu"];
  $keterangan    = $_POST["keterangan"];

  $cari_siswa   = mysqli_query($konek, "select * from siswa where nomorkartu='$nomorkartu'");
  $jumlah_data  = mysqli_num_rows($cari_siswa);

  if ($jumlah_data === 0) {
    echo "<script>
      alert('Nomor kartu $nomorkartu tidak terdaftar');
    </script>";
  } else {
    $data_siswa = mysqli_fetch_array($cari_siswa);
    $nama       = $data_siswa['nama'];

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');

    $cari_absen = mysqli_query($konek, "select * from absensi where nomorkartu='$nomorkartu' and tanggal='$tanggal'");
    $jumlah_absen = mysqli_num_rows($cari_absen);

    if($jumlah_absen == 0) {
      mysqli_query($konek, "insert into absensi(nomorkartu, tanggal, keterangan)values('$nomorkartu', '$tanggal', '$keterangan')");

      echo "<script>
        alert('Absensi telah ditambahkan');
        location.replace('absensi.php');
      </script>";
    }
    else{
      mysqli_query($konek, "update absensi set keterangan='$keterangan' where nomorkartu='$nomorkartu' and tanggal='$tanggal'");

      echo "<script>
        alert('Absensi telah diubah');
        location.replace('absensi.php');
      </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<?php include "dataTables.php"; ?>
	<title>Tambah Absensi</title>
</head>
<body>
	
	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
    <h3>Rekap Absensi</h3>
		<form action="#" method="POST" style="min-height: 70vh;">
      <div class="form-group">
        <label for="nokartu">No Kartu Siswa</label>
        <input type="text" class="form-control" name="nokartu" id="nokartu" placeholder="No Kartu" style="max-width: 400px;" />
      </div>
      <div class="form-group">
        <label for="nokartu">Kehadiran</label>
        <div>
          <div class="radio-inline">
            <label>
              <input type="radio" name="keterangan" id="sakit" value="SAKIT" required />
              SAKIT
            </label>
          </div>
          <div class="radio-inline">
            <label>
              <input type="radio" name="keterangan" id="izin" value="IZIN" required />
              IZIN
            </label>
          </div>
          <div class="radio-inline">
            <label>
              <input type="radio" name="keterangan" id="hadir" value="ALFA" required />
              ALFA
            </label>
          </div>
        </div>
      </div>
      
      <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
    </form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>