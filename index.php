<?php
 session_start();

 // set session
 if (isset($_SESSION["status"])) {
    header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>CARA MEMBUAT LOGIN DENGAN SESSION DI PHP</title>
<style type="text/css">
body { font-family: Verdana; font-size: 14px; background-color: #F7F7F7; }
input, button { padding: 7px; }
button { cursor: pointer; }
.container { background-color: #FFFFFF; border: 1px solid #000000; padding: 10px; width: 400px; margin: 0 auto; }
.container .form-control { margin-bottom: 10px; width: 100%; }
.container .form-control:last-child { margin-bottom: 0; }
.container .form-control input { width: 380px; }
.container .form-control button { width: 397px; }
.container .pesan { color: #FFFFFF; text-align: center; padding: 7px; background-color: #FF0000; font-weight: bold; }
</style>
</head>
<body>
<div class="container">
<h1><center>PANEL LOGIN</center></h1>
<hr />
<form action="login.php" method="POST">
<div class="form-control">
  <input type="text" name="user" placeholder="Masukan username">
</div>
<div class="form-control">
  <input type="password" name="pass" placeholder="Masukan password">
</div>
<div class="form-control">
  <button type="submit" name="submit">LOGIN</button>
</div>
<?php
// jika mendapatkan parameter $_GET['p']
if(isset($_GET['p'])){
?>
<div class="pesan">
<?php echo $_GET['p']; ?>
</div>
<?php } ?>
</form>
</div>
</body>
</html>
