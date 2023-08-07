<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Scan Kartu</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<!-- scanning membaca kartu RFID -->
	<script>
        // socket = new WebSocket("ws://192.168.1.150:8080");
        // socket.onopen = function(e) {  console.log("[socket] socket.onopen "); };
        // socket.onerror = function(e) {  console.log("[socket] socket.onerror "); };
        socket.onmessage = function(e) {  
            const obj = JSON.parse(e.data);
			console.log(obj.mode);
			console.log(obj.tagId);
			if(obj.mode != "" && obj.mode != undefined){
				$.ajax({
					type: "GET",
					url: "ubahmode.php" ,
					success : function(result) { 
						console.log(result);
					},
					error: function(e) {
						console.log(e);
					},
				});
			}
			
			if(obj.tagId != "" && obj.tagId != undefined){
				$.ajax({
					type: "POST",
					url: "bacakartu.php" ,
					data: { tagId: obj.tagId },
					success : function(result) { 
						const element = document.getElementById("animasi1");
						element.remove();
						const element2 = document.getElementById("animasi2");
						element2.remove();
						const element3 = document.getElementById("br");
						element3.remove();

						result = result.trim();
						console.log(result);
						let returnResult = result.split("::");
						console.log(returnResult.length);
						if(returnResult.length > 1){
							document.getElementById("mode").innerHTML = "Absen : "+returnResult[0];
							
							if(returnResult[0] == "Masuk"){
								document.getElementById("nama").innerHTML = "Selamat Datang, "+returnResult[1];
							}else{
								document.getElementById("nama").innerHTML = "Selamat Jalan, "+returnResult[1];
							}
							
						}else{
							console.log(returnResult[0]);
							if(result == "Masuk" || result == "Pulang"){
								document.getElementById("mode").innerHTML = "Absen : "+result;
								document.getElementById("nama").innerHTML = "Maaf Kartu Tidak Dikenali";
							}else{
								document.getElementById("mode").innerHTML = result;
								document.getElementById("nama").innerHTML = "";
							}
							
						}

						//your code to be executed after 2 second
						var delayInMilliseconds = 2000;
						setTimeout(function() {
							document.getElementById("mode").innerHTML = "";
							document.getElementById("nama").innerHTML = "Silahkan Tempelkan Kartu Anda";
							const animasi = document.getElementById("animasi");
							animasi.innerHTML +="<img id='animasi1' src='images/rfid.png' style='width: 200px'> <br id='br'>";
							animasi.innerHTML +="<img id='animasi2' src='images/animasi2.gif'>";
						}, delayInMilliseconds);

					},
					error: function(e) {
						console.log(e);
					},
				});
			}
        };
      </script>
</head>
<body>
	
	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid" style="padding-top: 10%">
		
		<div id="cekkartu">
			<div class="container-fluid" style="text-align: center;">
				<h3 id="mode"></h3>
				<h3 id="nama">Silahkan Tempelkan Kartu Anda</h3>
				<div id="animasi">
					<img id="animasi1" src="images/rfid.png" style="width: 200px;"> <br id="br">
					<img id="animasi2" src="images/animasi2.gif">
				</div>
			</div>
		</div>
	</div>
	<br>

	<?php include "footer.php"; ?>

</body>
</html>