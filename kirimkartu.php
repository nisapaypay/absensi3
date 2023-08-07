<?php 
	include "koneksi.php";

	//baca nomor kartu dari NodeMCU
	$nomorkartu = $_GET['nomorkartu'];
	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");

	//simpan nomor kartu yang baru ke tabel tmprfid
	$simpan = mysqli_query($konek, "insert into tmprfid(nomorkartu)values('$nomorkartu')");
	if($simpan)
		echo "Berhasil";
	else
		echo "Gagal";
?>