<?php
//mulai session
session_start();

//cek lagi apakah session telah terdaftar untuk username tersebut
if(session_is_registered('username')){

//dan jika terdaftar
header( "Location: admin.php" );
}
else{

//jika tidak terdaftar, kembalikan user ke login.html
header( "Location: index.php" );
}
?>