<?php
	include "koneksi.php";

	date_default_timezone_set('Asia/Jakarta');
	$month = date('m');
	$query = mysqli_query($konek, "select *, count(id) as total from absensi where tanggal like '%-$month-%' group by tanggal");
	while($data = mysqli_fetch_assoc($query)){
		$data['tanggal'] = date("d-m-Y", strtotime($data['tanggal']));
		$datas[] = $data;
	}
	echo json_encode($datas); 
?>