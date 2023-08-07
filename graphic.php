<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title> Grafik Persentase Kehadiran Siswa </title>
	<style type="text/css">
		canvas{
		  width:100% !important;
		  height:600px !important;
		}
	</style>
</head>
<body>
	<?php include "menu.php"; ?>
		<div class="d-flex align-items-center justify-content-center">
  			<canvas id="myChart" style="text-align: center"></canvas>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<?php include "footer.php"; ?>

<script>
  const ctx = document.getElementById('myChart');
  let dataAbsensi = [];
  let listLabel = [];
  let listData = [];
  let bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  $.ajax({
    type: "GET",
    url: "summary.php" ,
    success : function(result) { 
      dataAbsensi = JSON.parse(result);
      let bulanString = [];
      let intBulan = 0;

      for(let i = 0; i < dataAbsensi.length; i++){
        listLabel[i] = dataAbsensi[i].tanggal;
        listData[i] = dataAbsensi[i].total;

        bulanString = dataAbsensi[i].tanggal.split("-");
        intBulan = parseInt(bulanString[1]);
      }

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: listLabel,
          datasets: [{
            label: 'Absensi Bulan '+bulan[intBulan-1],
            data: listData,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    },
    error: function(e) {
      console.log(e);
    },
  });


  
</script>

</body>
</html>