<?php 
	include "koneksi.php";
	//baca isi tabel tmprfid
	$sql = mysqli_query($konek, "select * from tmprfid");
	$data = mysqli_fetch_array($sql);
	//baca kartu
	$nomorkartu = $data['nomorkartu'];
?>

<div class="form-group">
	<label>Nomor Kartu</label>
	<Input type="text" name="nomorkartu" id="nomorkartu" placeholder="tempelkan kartu anda" class="form-control" style="width: 200px" value="<?php echo $nomorkartu; ?>">
</div>