<?php
	session_start();
	include "koneksi.php";
  $sqldata  = mysqli_query($konek, "select * from configdate");
  $data     = mysqli_fetch_array($sqldata);

  $jammasuk   = $data["jammasuk"];
  $jamkeluar  = $data["jamkeluar"];


  if(isset($_POST["changeTime"])) {

    $jammasuk   = $_POST["jammasuk"];
    $jamkeluar  = $_POST["jamkeluar"];

    $sql = mysqli_query($konek, "update configdate set jammasuk='$jammasuk', jamkeluar='$jamkeluar'");
    if($sql)
      echo "<p>Berhasil diubah</p>";
    else 
      echo "<p>Gagal diubah</p>";

  }

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
		<h3>Edit Jam Masuk/Pulang</h3>

		<!-- form input -->
    <form action="#" method="POST" style="min-height: 70vh;">
      <div class="form-group">
        <label for="jammasuk">Jam Masuk</label>
        <input type="time" name="jammasuk" id="jammasuk" class="form-control" style="max-width: 200px" value="<?php echo $jammasuk;?>" />
      </div>
      <div class="form-group">
        <label for="jamkeluar">Jam Pulang</label>
        <input type="time" name="jamkeluar" id="jamkeluar" class="form-control" style="max-width: 200px" value="<?php echo $jamkeluar;?>" />
      </div>
      <button type="submit" name="changeTime" value="submit" class="btn btn-primary">Submit</button>
    </form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>

